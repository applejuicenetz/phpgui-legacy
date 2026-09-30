if (window.location.protocol === 'https:' && navigator.registerProtocolHandler) {
    const handlerUrl = new URL('../index.php?ajfsp_link=%s', document.currentScript.src);
    navigator.registerProtocolHandler('web+ajfsp', handlerUrl.href, 'appleJuice Link');
}
