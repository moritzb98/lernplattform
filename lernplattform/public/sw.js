if(!self.define){const e=e=>{"require"!==e&&(e+=".js");let c=Promise.resolve();return a[e]||(c=new Promise((async c=>{if("document"in self){const a=document.createElement("script");a.src=e,document.head.appendChild(a),a.onload=c}else importScripts(e),c()}))),c.then((()=>{if(!a[e])throw new Error(`Module ${e} didn’t register its module`);return a[e]}))},c=(c,a)=>{Promise.all(c.map(e)).then((e=>a(1===e.length?e[0]:e)))},a={require:Promise.resolve(c)};self.define=(c,d,f)=>{a[c]||(a[c]=Promise.resolve().then((()=>{let a={};const i={uri:location.origin+c.slice(1)};return Promise.all(d.map((c=>{switch(c){case"exports":return a;case"module":return i;default:return e(c)}}))).then((e=>{const c=f(...e);return a.default||(a.default=c),a}))})))}}define("./sw.js",["./workbox-3088b897"],(function(e){"use strict";self.addEventListener("message",(e=>{e.data&&"SKIP_WAITING"===e.data.type&&self.skipWaiting()})),e.precacheAndRoute([{url:"css/app.css",revision:"efadab59b40add4ce1f3c45c7ff780ba"},{url:"favicon.ico",revision:"d41d8cd98f00b204e9800998ecf8427e"},{url:"manifest.json",revision:"a6e698b4853d7069af850bb04d381d19"},{url:"mix-manifest.json",revision:"207fd484b7c2ceeff7800b8c8a11b3b6"},{url:"recipe-book.png",revision:"f64f74afdcba8f302b3ffdcf456938a6"},{url:"storage/uploads/1620036415_pic1.png",revision:"ccf94b739f8824cd2415b3163e9b90c1"},{url:"storage/uploads/1620038022_pic1.png",revision:"ccf94b739f8824cd2415b3163e9b90c1"},{url:"storage/uploads/1620038264_pic2.png",revision:"8ef1aaf54de2ad89b5ee2f8be4dbeaaf"},{url:"storage/uploads/1620038534_pic3.png",revision:"f7af9bf100050232b720c9f43c3c0dcd"},{url:"storage/uploads/1620038578_pic3.png",revision:"f7af9bf100050232b720c9f43c3c0dcd"},{url:"storage/uploads/1620062305_pic1.png",revision:"ccf94b739f8824cd2415b3163e9b90c1"},{url:"storage/uploads/1620062720_pic2.png",revision:"8ef1aaf54de2ad89b5ee2f8be4dbeaaf"},{url:"storage/uploads/1620063815_pic3.png",revision:"f7af9bf100050232b720c9f43c3c0dcd"},{url:"storage/uploads/1620157479_pic1.png",revision:"ccf94b739f8824cd2415b3163e9b90c1"},{url:"storage/uploads/1620159124_pic2.png",revision:"8ef1aaf54de2ad89b5ee2f8be4dbeaaf"},{url:"storage/uploads/1620159506_pic3.png",revision:"f7af9bf100050232b720c9f43c3c0dcd"},{url:"storage/uploads/1620202398_Antrag PA2.pdf",revision:"092fab9743d0193b4ef2c22c77c1a4f5"},{url:"storage/uploads/1620206538_pic1.png",revision:"ccf94b739f8824cd2415b3163e9b90c1"},{url:"storage/uploads/1620224698_pic1.png",revision:"ccf94b739f8824cd2415b3163e9b90c1"},{url:"storage/uploads/1620282207_pic2.png",revision:"8ef1aaf54de2ad89b5ee2f8be4dbeaaf"},{url:"storage/uploads/1620381917_pic1.png",revision:"ccf94b739f8824cd2415b3163e9b90c1"},{url:"storage/uploads/1620382226_pic1.png",revision:"ccf94b739f8824cd2415b3163e9b90c1"},{url:"storage/uploads/1620382283_pic2.png",revision:"8ef1aaf54de2ad89b5ee2f8be4dbeaaf"},{url:"storage/uploads/1620640555_pic1.png",revision:"ccf94b739f8824cd2415b3163e9b90c1"},{url:"storage/uploads/1620736201_pic3.png",revision:"f7af9bf100050232b720c9f43c3c0dcd"},{url:"storage/uploads/1622284166_Wolke-7-Supertext.jpeg",revision:"4af36ca64c8bd8fdd39cddb586c7651b"},{url:"storage/uploads/1622284220_kaffee.jpeg",revision:"fa3a8596e1e2d9c3f8ca8d480c0488db"},{url:"storage/uploads/1622284275_kaffee.jpeg",revision:"fa3a8596e1e2d9c3f8ca8d480c0488db"},{url:"upload/1620062305_pic1.png",revision:"ccf94b739f8824cd2415b3163e9b90c1"},{url:"upload/1620062720_pic2.png",revision:"8ef1aaf54de2ad89b5ee2f8be4dbeaaf"},{url:"upload/1620063815_pic3.png",revision:"f7af9bf100050232b720c9f43c3c0dcd"},{url:"upload/1620135277_bacteria (1)-01.png",revision:"4b6c40c697217cd0f9259d2d687817e4"},{url:"upload/1620135287_untitled.png",revision:"9f0736ebfeb5cf6a814ecbf2c909c740"},{url:"upload/1620157479_pic1.png",revision:"ccf94b739f8824cd2415b3163e9b90c1"},{url:"upload/1620159124_pic2.png",revision:"8ef1aaf54de2ad89b5ee2f8be4dbeaaf"},{url:"upload/1620159506_pic3.png",revision:"f7af9bf100050232b720c9f43c3c0dcd"},{url:"upload/1620199687_1620135277_bacteria (1)-01.png",revision:"4b6c40c697217cd0f9259d2d687817e4"},{url:"upload/1620202398_Antrag PA2.pdf",revision:"092fab9743d0193b4ef2c22c77c1a4f5"},{url:"upload/1620206538_pic1.png",revision:"ccf94b739f8824cd2415b3163e9b90c1"},{url:"upload/1620224279_bacteria (1)-01.png",revision:"4b6c40c697217cd0f9259d2d687817e4"},{url:"upload/1620224698_pic1.png",revision:"ccf94b739f8824cd2415b3163e9b90c1"},{url:"upload/1620381917_pic1.png",revision:"ccf94b739f8824cd2415b3163e9b90c1"},{url:"upload/1620382226_pic1.png",revision:"ccf94b739f8824cd2415b3163e9b90c1"},{url:"upload/1620382283_pic2.png",revision:"8ef1aaf54de2ad89b5ee2f8be4dbeaaf"},{url:"upload/1620397844_qfj97aj7-900.jpg",revision:"31b4e826c8ebdf638204d40cc9098ae7"},{url:"upload/1620553808_gettyimages-97743483-1024x1024.jpg",revision:"501702dc17f2ed83012fd11c3989a9f8"},{url:"upload/1620553842_untitled.png",revision:"9f0736ebfeb5cf6a814ecbf2c909c740"},{url:"upload/1620591266_qfj97aj7-900.jpg",revision:"31b4e826c8ebdf638204d40cc9098ae7"},{url:"upload/1620591269_qfj97aj7-900.jpg",revision:"31b4e826c8ebdf638204d40cc9098ae7"},{url:"upload/1620640555_pic1.png",revision:"ccf94b739f8824cd2415b3163e9b90c1"},{url:"upload/1620644173_csm_Brasilien_699ec37496.png",revision:"4f149b9f194c3dba2b7a60e3766f79f8"},{url:"upload/1620644180_Fragezeichen.jpg",revision:"da5f3f048dc66acd00e0f8bfc5591c3f"},{url:"upload/1620736201_pic3.png",revision:"f7af9bf100050232b720c9f43c3c0dcd"},{url:"upload/1620802366_auth-route.JPG",revision:"17661a8c62c7576dcddc009f5dd4e199"},{url:"upload/1620802445_auth-route.JPG",revision:"17661a8c62c7576dcddc009f5dd4e199"},{url:"upload/1622284166_Wolke-7-Supertext.jpeg",revision:"4af36ca64c8bd8fdd39cddb586c7651b"},{url:"upload/1622284220_kaffee.jpeg",revision:"fa3a8596e1e2d9c3f8ca8d480c0488db"},{url:"upload/1622284275_kaffee.jpeg",revision:"fa3a8596e1e2d9c3f8ca8d480c0488db"},{url:"web.config",revision:"fa88f3e062fed5690e2601c21fbd13af"}],{ignoreURLParametersMatching:[/^utm_/,/^fbclid$/]})}));
//# sourceMappingURL=sw.js.map