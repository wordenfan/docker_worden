var express = require('express');
var ParseServer = require('parse-server').ParseServer;
var ParseDashboard = require('parse-dashboard');
var path = require('path');

// Parse Server

var api = new ParseServer({
  // databaseURI: 'mongodb://admin:zhouyifan3#@ds015451-a0.mlab.com:15451,ds015451-a1.mlab.com:15451/gesoo?replicaSet=rs-ds015451',
  databaseURI: 'mongodb://admin:zhouyifan3%23@ds015451-a0.mlab.com:15451,ds015451-a1.mlab.com:15451/gesoo?replicaSet=rs-ds015451',
  cloud: __dirname + '/cloud/main.js',
  appId: 'b32h7SrhRXGiD3Ubvt2KQHtiR3VPrPgYWIxO3l5Z',
  masterKey: 'wUiX7rQ0B58FeT2IdxbaK6hn3JXWPhb2998oq9C7',
  serverURL: 'https://gesoo.herokuapp.com/parse',
  publicServerURL: 'https://api.gesoo.com/parse',
  appName: 'Gesoo',
  maxUploadSize: '50mb',
  emailAdapter: {
    module: '@parse/simple-mailgun-adapter',
    options: {
      fromAddress: 'noreply@gesoo.com',
      domain: 'mg.gesoo.com',
      apiKey: '70e8cc3950f4eb3422a651f1e92abc95-6b60e603-d0458335',
    }
  },
  verifyUserEmails: true,
  emailVerifyTokenValidityDuration: 7200,
  passwordPolicy: {
    resetTokenValidityDuration: 86400
  },
  push: {
    android: {
      apiKey: 'AAAAZr_W26E:APA91bEkRdTgtdoJ5kshmRKNvlYAK1V-ypfO5wwdPrvYKHZoS7yELsS5iMQwIIC4ep35Su6BU4bbMKo4Vq6TsHehgwDE-Ioiiaxz0YmOhRCQ768b14-RMtIyW1OMMzzQGuZbFGfewbd6'
    },
    ios: [
      {
        pfx: __dirname + '/push/Gesoo_Development.p12',
        topic: 'com.Yifan.Gesoo',
        production: false
      },
      {
        pfx: __dirname + '/push/Gesoo.p12',
        topic: 'com.Yifan.Gesoo',
        production: true
      }
    ]
  },
  auth: {
   facebook: {
     appIds: '1651595771774209'
   }
  }
});

// Parse Dashboard

var dashboard = new ParseDashboard({
  'apps': [
    {
      'serverURL': 'https://gesoo.herokuapp.com/parse',
      'appId': 'b32h7SrhRXGiD3Ubvt2KQHtiR3VPrPgYWIxO3l5Z',
      'masterKey': 'wUiX7rQ0B58FeT2IdxbaK6hn3JXWPhb2998oq9C7',
      'appName': 'Gesoo'
    }
  ],
  'users': [
    {
      'user': 'fxchou123',
      'pass': '$2y$10$F32nYitrBU1QQEBAbPNiLOBffg/Ts/0Mkd91MquB35DLrTFTxFVt.'
    },
    {
      'user': 'support',
      'pass': '$2y$10$Hqgs/qIkw1Qj9K99Gru3KeAb/zir50xmpqTqNTOZHaP9v3vmHLRp6'
    }
  ],
  'useEncryptedPasswords': true,
  'trustProxy': 1
}, true);

var app = express();

app.use('/parse', api);
app.use('/dashboard', dashboard);

app.get('/', function(req, res) {
  res.status(200).send('Thanks for using Gesoo.');
});

var port = process.env.PORT || 1337;
var httpServer = require('http').createServer(app);
httpServer.listen(port, function() {
    console.log('Gesoo Parse Server running on port ' + port + '.');
});
