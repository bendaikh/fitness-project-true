window.Echo.channel("testnotification")
    .listen('LiveChatEvent', (e) => {
        console.log(e);
    });

    console.log('hello khalil');
