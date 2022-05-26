<template>
    <div>
          <div id="gjs" style="height:0px; overflow:hidden">
      
    </div>
        <!-- <div id="blocks"></div> -->
    </div>
</template>

<style>
</style>

<script>

import grapesjs from 'grapesjs'
import 'grapesjs/dist/css/grapes.min.css'
import 'grapesjs/dist/grapes.min.js'
import 'grapesjs-preset-webpage/dist/grapesjs-preset-webpage.min.css'
import 'grapesjs-preset-webpage/dist/grapesjs-preset-webpage.min.js'
import 'grapesjs-blocks-bootstrap4/dist/grapesjs-blocks-bootstrap4.min.js'

export default {
    name: "PageEdit",

    mounted() {
        let editor = grapesjs.init({
            container : '#gjs',
            plugins: [
                
                'gjs-preset-webpage', 
               
            ],
            storageManager: {
                id: "gjs-",
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
                    // blocks: ["link-block", "quote", "text-basic"],
                },
                // 'grapesjs-blocks-bootstrap4': {
                //     blocks: {
                //     },
                //     blockCategories: {
                //     },
                //     labels: {
                //         // ...
                //     },
                //     // ...
                // }
            },
            canvas: {
                // styles: [
                // 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css'
                // ],
                // scripts: [
                // 'https://code.jquery.com/jquery-3.3.1.slim.min.js',
                // 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js',
                // 'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'
                // ],
            }
        });

        // editor.BlockManager.add('h1-block', {
        //     label: "Custom Widget",
        //     content:`
        //             <style>
        //                 .grid-container {
        //                     display: grid;
        //                     grid-template-columns: auto auto auto auto;
        //                     grid-gap: 10px;
        //                     padding: 10px;
        //                 }
        //                 img {
        //                     width: 100%;
        //                     height: 50%;
        //                 }
        //             </style>
        //             <div>
        //                 <div class="grid-container">
        //                     <div class="item1 container">
        //                         <img class="mr-3" src="/images/person.png">
        //                     </div>
        //                     <div class="item2">
        //                         <img src="/images/speech_bubble.png">
        //                     </div>
        //                 </div>
        //             </div>
        //         `,
        //     activate: true,
        // });
        editor.BlockManager.add('h1-block', {
            label: "Custom Widget",
            content:`
                    <style>
                        * {
  box-sizing: border-box;
}
body {
  margin: 0;
}
.row{
  display:table;
  padding-top:10px;
  padding-right:10px;
  padding-bottom:10px;
  padding-left:10px;
  width:100%;
}
.cell{
  width:8%;
  display:table-cell;
  height:75px;
}
.grid-container{
  display:grid;
  grid-template-columns:auto auto auto auto;
  row-gap:10px;
  column-gap:10px;
  padding-top:10px;
  padding-right:10px;
  padding-bottom:10px;
  padding-left:10px;
}
img{
  width:100%;
  height:50%;
}
.mr-3{
  height:132px;
  width:135.375px;
  margin:0 0 0 13px;
  padding:0 0 0 0;
}
#if2i3{
  height:87px;
  width:279px;
}
.item1.container{
  padding:0 0 0 0;
  width:22px;
}
#i6fvl{
  padding:10px;
  position: absolute;
  top: 5%;
  left: 8%;
}
@media (max-width: 768px){
  .cell{
    width:100%;
    display:block;
  }
}

                    </style>
                    <div class="row">
                        <div class="cell">
                            <div class="row">
                                <div class="cell">
                                <div id="i7yb">
                                    <div class="grid-container">
                                    <div class="item1 container">
                                        <img src="/images/person.png" class="mr-3"/>
                                    </div>
                                    <div class="item2">
                                        <div id="i6fvl">Insert your text here
                                        </div>
                                        <img src="/images/speech_bubble.png" id="if2i3"/>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="cell">
                                </div>
                            </div>
                        </div>
                    </div>
                `,
            activate: true,
        });
    },
};
</script>
