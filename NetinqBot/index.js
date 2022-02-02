const Discord = require("discord.js");
const app = new Discord.Client({
  intents: [
    Discord.Intents.FLAGS.GUILDS,
    Discord.Intents.FLAGS.GUILD_MESSAGES,
    Discord.Intents.FLAGS.GUILD_VOICE_STATES,
    Discord.Intents.FLAGS.GUILD_MEMBERS,
    Discord.Intents.FLAGS.GUILD_INVITES,
  ],
});
const channelEvent = require("./src/ChannelEvents");
const nitroEvent = require("./src/NitroEvent");
const { concoursEvent, buttonEvent, tirage } = require("./src/Concours");

app.on("ready", () => {
  console.log(`Logged in as ${app.user.tag}!`);
});
// app.on('guildMemberAdd', (member) => joinEvent(member, app));

app.on("messageCreate", (message) => nitroEvent(message, app));
app.on("messageCreate", (message) => concoursEvent(message, app));
app.on("messageCreate", (message) => tirage(message, app));
app.on("voiceStateUpdate", (oldMember, newMember) =>
  channelEvent(oldMember, newMember)
);

app.on("interactionCreate", async (interaction) =>
  buttonEvent(interaction, app)
);

app.login("NjQ1NzU2ODExNjU1MzgwOTky.XouWCA.S4XUsKpExenIqIW8j0JDitPg6Ds");
