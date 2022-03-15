function backgr(){
    var backimg = ["/webanter/backgrounds/001.jpg",
        "/webanter/backgrounds/002.jpg",
        "/webanter/backgrounds/003.jpg",
        "/webanter/backgrounds/004.jpg",
        "/webanter/backgrounds/005.jpg",
        "/webanter/backgrounds/006.jpg",
        "/webanter/backgrounds/007.jpg",
        "/webanter/backgrounds/008.jpg",
        "/webanter/backgrounds/009.jpg",
        "/webanter/backgrounds/010.jpg",
        "/webanter/backgrounds/011.jpg",
        "/webanter/backgrounds/012.jpg",
        "/webanter/backgrounds/013.jpg",
        "/webanter/backgrounds/014.jpg",
        "/webanter/backgrounds/015.jpg",];
    var randimg =Math.floor(Math.random()*15);
    document.body.background = backimg[randimg];
}