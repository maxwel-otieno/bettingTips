function removeAllChildNodes(parent) {
    while (parent.firstChild) {
        parent.removeChild(parent.firstChild);
    }
}

function play(link){
    var iframe = document.createElement("iframe");
    iframe.src = link;

    var container = document.getElementById("game");
    removeAllChildNodes(container);
    container.appendChild(iframe);
}