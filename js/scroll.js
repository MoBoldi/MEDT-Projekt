let index = 0;
let bookmarks = [];
document.getElementsByTagName('footer')[0].id = maxBookmarks;
for (let i = 0; i < maxBookmarks+1; i++){
    bookmarks.push(document.getElementById(''+i));
}
let scrollValue = 470;
let html = document.getElementsByTagName('html')[0];
let maxScrollHeight = html.scrollHeight - html.clientHeight;
html.addEventListener('wheel', function(event) {
    if (event.deltaY < 0) {
        //scrolling up
        if (index > 0){
            goto(index -= 1);
        }
    } else if (event.deltaY > 0) {
        //scrolling down
        if (index <= maxBookmarks-1){
            goto(index += 1);
        }
    }
});
function goto(anchor){
    window.location.href = "#"+anchor;
}