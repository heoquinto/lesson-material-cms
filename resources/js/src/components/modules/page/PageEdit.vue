<template>
    <div>
        <div id="gjs" style="height:0px; overflow:hidden"/>
    </div>
</template>

<script>
'use strict';

import axios from 'axios';
import grapesjs from 'grapesjs'
import 'grapesjs-preset-webpage/dist/grapesjs-preset-webpage.min.css'
import 'grapesjs-preset-webpage/dist/grapesjs-preset-webpage.min.js'
import 'grapesjs/dist/css/grapes.min.css'
import 'grapesjs/dist/grapes.min.js'

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
                                    <img src="data:image/png;base64,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">
                                </div>
                                <div>
                                    <div class="speech-bubble-box">
                                        <img src="data:image/png;base64,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">
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
                                    <img src="data:image/png;base64,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">
                                    <div class="text">
                                        <p>Place you text here </p>
                                    </div>
                                </div>
                            </div>
                            <div class="container">
                                <img src="data:image/png;base64,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">
                            </div>
                        </div>
                    </div>
                `,
            activate: true,
        });
    },

    methods: {
        saveTemplate (editor) {
            axios({
                method: 'POST',
                url: '/save-page',
                data: {
                    html: editor.getHtml(),
                    css: editor.getCss(),
                    styles: editor.getStyle(),
                    components: editor.getComponents(),
                    id: this.$route.params.pageId
                }
            })
            .then((response) => {
                if(response.status === 200) {
                    this.$notification.success(
                        "Changes saved successfully!", 'toast-bottom-left'
                    );
                } else {
                    alert("Something went wrong. Please try again.");
                }
            });
        }
    }
};
</script>
