export type ToggleableSettingsData = {
  disableXmlRpc: boolean;
  forceHttps: boolean;
  maintenanceMode: boolean;
  forceWww: boolean;
  isEligibleWwwRedirect: boolean;
  disableAuthenticationPassword: boolean;
};

export type NonToggleableSettingsData = {
  bypassCode: string;
  currentWpVersion: string;
  newestWpVersion: string;
  phpVersion: string;
};

export type HostingerToolsData = {
  homeUrl: string;
  siteUrl: string;
<<<<<<< HEAD
  editSiteUrl: string;
=======
>>>>>>> fa623e74ce55ca1a48265d395a80daf0b504f244
  pluginUrl: string;
  assetUrl: string;
  translations: { [key: string]: string };
  restBaseUrl: string;
  nonce: string;
  wpVersion: string;
  phpVersion: string;
};

export type SettingsData = NonToggleableSettingsData & ToggleableSettingsData;
