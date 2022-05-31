<template>
    <div>
        <div id="gjs" style="height:0px; overflow:hidden"/>
    </div>
</template>

<script>
'use strict';

import grapesjs from 'grapesjs'
import 'grapesjs/dist/css/grapes.min.css'
import 'grapesjs/dist/grapes.min.js'
import 'grapesjs-preset-webpage/dist/grapesjs-preset-webpage.min.css'
import 'grapesjs-preset-webpage/dist/grapesjs-preset-webpage.min.js'
import axios from 'axios';

export default {
    name: "PageEdit",

    mounted() {
        let editor = grapesjs.init({
            container : '#gjs',
            plugins: ['gjs-preset-webpage'],
            storageManager: {
                id: `gjs-${this.$route.params.pageId}-`,
                type: "local",
                autosave: true,
                storeComponents: true,
                storeStyles: true,
                storeHtml: true,
                storeCss: true,
            },
            deviceManager: {
                devices: [
                    {
                        id: "desktop",
                        name: "Desktop",
                        width: "",
                    },
                    {
                        id: "tablet",
                        name: "Tablet",
                        width: "768px",
                        widthMedia: "992px",
                    },
                    {
                        id: "mobilePortrait",
                        name: "Mobile portrait",
                        width: "320px",
                        widthMedia: "575px",
                    },
                ],
            },
            pluginsOpts: {
                "grapesjs-preset-webpage": {
                    blocksBasicOpts: {
                        blocks: [
                            "column1",
                            "column2",
                            "column3",
                            "column3-7",
                            "text",
                            "link",
                            "image",
                            "video",
                        ],
                        flexGrid: 1,
                    },
                    blocks: ["link-block", "quote", "text-basic"],
                },
            },
        });

        editor.Panels.addButton('options', [ { 
            id: 'save', 
            className: 'fa fa-floppy-o icon-blank', 
            command: async () =>  {
                this.saveTemplate(editor);
            }, 
            attributes: { title: 'Save Template' }
        }]);

        setTimeout(() => {
            editor.BlockManager.getCategories().each(ctg => ctg.set('open', false))
        }, 100);
        
        editor.BlockManager.add('left-chat-bubble-block', {
                label: "Left Chat Bubble",
                media: this.svg.SVG_CHAT_LEFT_TEXT_FILL,
                category: {
                    id: 'custom-widgets', 
                    label: 'Custom Widgets'
                },
                content:`
                        <style>
                            .speech-bubble-container {
                                display: grid;
                                grid-template-columns: auto auto;
                            }
                            .speech-bubble-box{
                                position: relative;
                                display: inline-block;
                            }
                            .speech-bubble-box .left-text{
                                background-size: initial;
                                color: #595353;
                                left: 85px;
                                position: absolute;
                                top: 22%;
                                width: 60%;
                            }
                            img {
                                width: 90%
                            }
                        </style>
                        <div>
                            <div class="speech-bubble-container">
                                <div class="container">
                                    <img src="/images/person.png">
                                </div>
                                <div>
                                    <div class="speech-bubble-box">
                                        <img src="/images/speech-bubble-left-2.png">
                                        <div class="left-text">
                                            <p>Place you text here </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `,
                activate: true,
            },
        );

        editor.BlockManager.add('right-chat-bubble-block', {
            label: "Right Chat Bubble",
            media: this.svg.SVG_CHAT_RIGHT_TEXT_FILL,
            category: {
                id: 'custom-widgets', 
                label: 'Custom Widgets',
            },
            content: `
                    <style>
                        .speech-bubble-container-right {
                            display: grid;
                            grid-template-columns: auto auto;
                        }
                        .speech-bubble-box-right {
                            position: relative;
                            display: inline-block;
                        }
                        .speech-bubble-box-right .text{
                            background-size: initial;
                            color: #fff;
                            left: 85px;
                            position: absolute;
                            top: 22%;
                            width: 60%;
                        }
                        img {
                            width: 100%
                        }
                    </style>
                    <div>
                        <div class="speech-bubble-container-right">
                            <div>
                                <div class="speech-bubble-box-right">
                                    <img src="/images/speech-bubble-right-2.png">
                                    <div class="text">
                                        <p>Place you text here </p>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <img src="/images/person.png">
                            </div>
                        </div>
                    </div>
                `,
            activate: true,
        });  
    },

    methods: {
        saveTemplate (editor) {
            // alert(editor.getHtml()) ;
            axios({
                method: 'POST',
                url: '/save-page',
                data: {
                    html: encodeURI(editor.getHtml()),
                    css: editor.getCss(),
                    styles: editor.getStyle(),
                    components: editor.getComponents(),
                    id: this.$route.params.pageId
                }
                })
                .then(function (response) {
                   if(response.status === 200) {
                       alert("Changes saved successfully!");
                   } else {
                       alert("Something went wrong. Please try again.");
                   }
                });
        }
    }
};
</script>
