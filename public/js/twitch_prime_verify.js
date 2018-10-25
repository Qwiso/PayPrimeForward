const TwitchBot = require('twitch-bot');

let user_id = null;
let name = '';
let auth = '';
let botAuth = '';
let csrf = '';

process.argv.forEach(function (val, index, array) {
    if (index == 2) user_id = val;
    if (index == 3) name = val;
    if (index == 4) auth = val;
    if (index == 5) botAuth = val;
    if (index == 6) csrf = val;
});

const BotClient = new TwitchBot({
    username: 'payprimeforward',
    oauth: 'oauth:' + botAuth,
    channels: [name]
});

const UserClient = new TwitchBot({
    username: name,
    oauth: 'oauth:' + auth,
    channels: [name]
});

BotClient.on('message', chatter => {
    if (chatter.message == "#payprimeforward")
    {
        if (chatter.badges.premium == 1)
        {
            console.log(true);
            process.exit();
        }
        console.log(false);
        process.exit();
    }
});

UserClient.on('join', channel => {
    UserClient.say('#payprimeforward')
});