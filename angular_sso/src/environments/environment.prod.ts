export const environment = {
  production: true,
  azure: {
    issuer: 'https://idsvr4.azurewebsites.net',
    redirectUri: window.location.origin + '/index.html',
    clientId: 'spa',
    scope: 'openid profile email offline_access api',
    requireHttps: true,
  }
};
