function backgr(){
    var backimg = ["/backgrounds/001.jpg",
        "/backgrounds/002.jpg",
        "/backgrounds/003.jpg",
        "/backgrounds/004.jpg",
        "/backgrounds/005.jpg",
        "/backgrounds/006.jpg",
        "/backgrounds/007.jpg",
        "/backgrounds/008.jpg",
        "/backgrounds/009.jpg",
        "/backgrounds/010.jpg",
        "/backgrounds/011.jpg",
        "/backgrounds/012.jpg",
        "/backgrounds/013.jpg",
        "/backgrounds/014.jpg",
        "/backgrounds/015.jpg",];
    var randimg =Math.floor(Math.random()*15);
    document.body.background = backimg[randimg];
}