<?php

$goipName = 11;
//X - set device, YYY [1-999]
// 1 - goip4
// 2 - goip8
// 3 - goip16
// 4 - goip32
// 5 - 
// 6 - smb32
// 7 - smb128
// 8 - smb256

$SIPiOffset = 0;

// set variable SMS server
$smsPassword = '5555'; //SMS Server Password for all line
$smsServerPort = '44444'; //SMS Server Port
$smsServer = '192.168.16.15'; //SMS Server IP	
$smsServerEnable = '1'; //SMS Server [ 1 - enable sms server, 0 - disable sms server]

// set variable SIP server
$sipPassword = 'DKj3jMNVDSLjsdfg';
$sipProxy = '192.168.16.15:5505';
$sipHomeDomain = '';
$sipRegisterExpired = 300;
$sipStartRtp = 18000; //RTP Port Range
$sipStopRtp = 19000; //RTP Port Range
$sipPacketLength = '20'; // PacketLength (ms)	
$sipPort = 5677; //SIP Listening Port
$sipRndPortEnable = '1'; //SIP Listening Port Mode [ 1 - range; 0 - fix]
$sipRandPortInterval = '50';
$sipDiableGsmToSip = '0'; // Call IN via GSM
$sipNatKeepAliveDisable = '0'; //NAT Keep-alive [ 1 - disable Keep-alive NAT, 0 - enble Keep-alive Nat]
$sipConfigMode = 'LINE_MODE'; // LINE_MODE
$sip183 = '1'; // SIP INVITE Response [ 0 - 180 | 1 - 180,183 | 2 - 183 ]
$sipCodec1 = 'ulaw';
$sipCodec1Disable = '0';
$sipCodec2 = 'alaw';
$sipCodec2Disable = '0';
$sipCodec3 = 'g729';
$sipCodec3Disable = '1';
$sipCodec4 = 'g729a';
$sipCodec4Disable = '1';
$sipCodec5 = 'g729ab';
$sipCodec5Disable = '1';
$sipCodec6 = 'g7231';
$sipCodec6Disable = '1';
$sipCodec7 = '';
$sipCodec7Disable = '1';
$sipInviteAut = '3'; //  Call OUT Auth Mode	 [ 0 - None | 1 - ip | 2 - password | 3 - ip and password]
$dynamicConcurrenceCapabilitiesEnable = '1'; // Advance SIP Dynamic Concurrence Capabilities

$autoRedialEnable = '0'; // Call Out GSM Auto Redial [ 0 - disable auto redial | 1 - enable auto redial ]

// section Call OUT
$gsmSleepMode = '1'; // section Call OUT: [ 0 any calls |  1 -  answered calls ]
$gsmCountCalls = '1'; // section Call OUT:  calls occurs
$gsmWaitIntervalStart = ''; //section Call OUT: minimum seconds wait
$gsmWaitIntervalStop = ''; // section Call OUT: maximum seconds wait
$gsmPin1 = ''; // set pin1 for sim card
$gsmPin2 = ''; // set pin2 for sim card
$gsmGprsDisable = '1'; // Enable or disable GPRS mode
$gsmCallForwardEnable = '0'; // SIM Forward [0 - disable | 0 - enablke]
$gsmCallForwardNumber = '79211111999'; // SIM Forward set number for call forward

// set variable SMB remote server
$smbRSimEnable = '1'; // SMB Remote Server main section
$smbRSimServerEnable = '1'; //Remote SIM [ 1 - enable Remote SMB Server | 0 - disable Remote SMB Server] 
$smbServer = '192.168.16.15'; // ip or fqdn
$smbDeviceId = $goipName; //  ID
$smbDevicePassword = '5555'; //Password
$smbSetTcp = '1'; // Net protocol [0 - udp | 1 - tcp ]
$smbSetLongFormat = '1'; //SIM Data Format [ 1 - shot | 2 - long command ]
$smbEncryptKey = ''; //  Encryption Key for SMB server

$radminEnable = '1';
$radminServer = '192.168.16.15'; //Remote Server	
$radminPort = '1920'; // Remote Server Port
$radminDeviceName = $goipName . '_docker_goip'; //Remote Server ID	
$radminPassword = 'mmm'; //Remote Server Key


$autoProvisionEnable = '0'; // Auto-provision
$autoProvisionURL = 'http://192.168.16.15:8003/'; //  Provision Server
$autoProvisionRefresh = '5'; //Provision Interval

$sipCIDfwMode = '1';
$tz = 'GMT+4';

$gsmAutoChangeImeiEnable = '0'; // enable IMEI Auto Change
$gsmAutoChangeImeiInterval = '60'; // IMEI Auto Change Change Period(minute)
$gsmImeiRandomEnable = '1'; //Set Random IMEI When Module PowerUp

$autoRestCdrEnable = '1'; // Auto Reset CDR [ 1 - enable rest cdr | 0 - disable rest cdr] 
$autoRestCdrTime = "00:01"; // Reset CDR Time

$moduleRegistrationLimitDisable = '1'; //SIM: Module Registration when Limit run out	


echo "TZ=\"" . $tz . "\"\n";
echo "IMEI_AUTO_ENABLE=\"" . $gsmAutoChangeImeiEnable . "\"\n";
echo "IMEI_AUTO_T=\"" . $gsmAutoChangeImeiInterval . "\"\n";
echo "IMEI_RANDOM=\"" . $gsmImeiRandomEnable . "\"\n";


// set auto provision section
echo "AUTOCFG_REFRESH=\"" . $autoProvisionRefresh . "\"\n";
echo "AUTOCFG_SERVER=\"" . $autoProvisionURL . "\"\n";
echo "AUTOCFG=\"" . $autoProvisionEnable . "\"\n";

// set smb server config
echo "RMSIM_ENABLE=\"" . $smbRSimEnable . "\"\n";
echo "SMB_RMSIM=\"" . $smbRSimServerEnable . "\"\n";
echo "SMB_SVR=\"" . $smbServer . "\"\n";
echo "SMB_ID=\"" . $smbDeviceId . "\"\n";
echo "SMB_KEY=\"" . $smbDevicePassword . "\"\n";
echo "SMB_NET_TYPE=\"" . $smbSetTcp . "\"\n";
echo "SIMPIPE=\"" . $smbSetLongFormat . "\"\n";
echo "SMB_RC4_KEY=\"" . $smbEncryptKey . "\"\n";

// set RAdmin variable server
echo "RADMIN_ENABLE=\"" . $radminEnable . "\"\n";
echo "RADMIN_KEY=\"" . $radminPassword . "\"\n";
echo "RADMIN_ID=\"" . $radminDeviceName . "\"\n";
echo "RADMIN_PORT=\"" . $radminPort . "\"\n";
echo "RADMIN_SERVER=\"" . $radminServer . "\"\n";

// echo "SIP_CID_FW_MODE=\"".$sipCIDfwMode."\"\n";//hz
echo "RTP_PORT=\"" . $sipStartRtp . "-" . $sipStopRtp . "\"\n";
echo "PACKETIZE_PERIOD=\"" . $sipPacketLength . "\"\n";
echo "SIP_LOCAL_PORT=\"" . $sipPort . "\"\n";
echo "SIP_RANDOM_LC_PORT=\"" . $sipRndPortEnable . "\"\n";
echo "RANDOM_LC_PORT_INT=\"" . $sipRandPortInterval . "\"\n";
echo "SIP_NO_ALIVE=\"" . $sipNatKeepAliveDisable . "\"\n"; //
echo "SIP_CONFIG_MODE=\"" . $sipConfigMode . "\"\n";
echo "SIP_183=\"" . $sip183 . "\"\n";
echo "PREFER_CODEC1=\"" . $sipCodec1 . "\"\n";
echo "CODEC1_DISABLE=\"" . $sipCodec1Disable . "\"\n";
echo "PREFER_CODEC2=\"" . $sipCodec2 . "\"\n";
echo "CODEC2_DISABLE=\"" . $sipCodec2Disable . "\"\n";
echo "PREFER_CODEC3=\"" . $sipCodec3 . "\"\n";
echo "CODEC3_DISABLE=\"" . $sipCodec3Disable . "\"\n";
echo "PREFER_CODEC4=\"" . $sipCodec4 . "\"\n";
echo "CODEC4_DISABLE=\"" . $sipCodec4Disable . "\"\n";
echo "PREFER_CODEC5=\"" . $sipCodec5 . "\"\n";
echo "CODEC5_DISABLE=\"" . $sipCodec5Disable . "\"\n";
echo "PREFER_CODEC6=\"" . $sipCodec6 . "\"\n";
echo "CODEC6_DISABLE=\"" . $sipCodec6Disable . "\"\n";
echo "PREFER_CODEC7=\"" . $sipCodec7 . "\"\n";
echo "CODEC7_DISABLE=\"" . $sipCodec7Disable . "\"\n";
echo "SIP_INV_AUTH=\"" . $sipInviteAut . "\"\n";
echo "SIP_HWCAP=\"" . $dynamicConcurrenceCapabilitiesEnable . "\"\n";


echo "GSM_TRY=\"" . $autoRedialEnable . "\"\n";
echo "GPRS_DISABLE=\"" . $gsmGprsDisable . "\"\n";
echo "EXPIRY_MODULE_DISABLE=\"" . $moduleRegistrationLimitDisable . "\"\n";




echo "AUTO_RESET_CDR=\"" . $autoRestCdrEnable . "\"\n";
echo "RESET_CDR_TIME=\"" . $autoRestCdrTime . "\"\n";

for ($i = 0; $i < 8; ++$i) {
    $smsLogin = $goipName * 100 + $i + 1;
    $sipGroup = $i + 1;
    $sipLogin = $goipName * 100 + $sipGroup;
    $iOffset = $i + $SIPiOffset;

    echo "L" . $sipGroup . "_SMS_CLI_PASSWD=\"" . $smsPassword . "\"\n";
    echo "L" . $sipGroup . "_SMS_CLI_ID=\"" . $smsLogin . "\"\n";
    echo "L" . $sipGroup . "_SMS_PORT=\"" . $smsServerPort . "\"\n";
    echo "L" . $sipGroup . "_SMS_SERVER=\"" . $smsServer . "\"\n";
    echo "L" . $sipGroup . "_SMS_SENDER=\"" . $smsServerEnable . "\"\n";


    echo "L" . $sipGroup . "_P_DIGIT_MAP=\"" . $sipLogin . ":-" . $sipLogin . "\"\n";
    echo "L" . $sipGroup . "_DISABLE_IN=\"" . $sipDiableGsmToSip . "\"\n";

    echo "L" . $sipGroup . "_FW_NUM_TO_VOIP=\"" . $sipLogin . "\"\n";

    echo "SIP_CONTACT" . $iOffset . "_DISABLE=\"" . "0" . "\"\n";
    echo "SIP_CONTACT" . $iOffset . "_GROUP=\"" . $sipGroup . "\"\n";
    echo "SIP_CONTACT" . $iOffset . "_GW_PREFIX=\"" . $sipLogin . "\"\n";
    echo "SIP_CONTACT" . $iOffset . "_PASSWD=\"" . $sipPassword . "\"\n";
    echo "SIP_CONTACT" . $iOffset . "_LOGIN=\"" . $sipLogin . "\"\n";
    echo "SIP_CONTACT" . $iOffset . "_DIAL_DIGITS=\"" . $sipLogin . "\"\n";
    echo "SIP_CONTACT" . $iOffset . "_OUTBOUND_PROXY=\"\"\n";
    echo "SIP_CONTACT" . $iOffset . "_HOME_DOMAIN=\"" . $sipHomeDomain . "\"\n";
    echo "SIP_CONTACT" . $iOffset . "_REGISTER_EXPIRED=\"$sipRegisterExpired\"\n";
    echo "SIP_CONTACT" . $iOffset . "_DISPLAY_NAME=\"" . $sipLogin . "\"\n";
    echo "SIP_CONTACT" . $iOffset . "_SERVER=\"" . $sipProxy . "\"\n";
    echo "SIP_CONTACT" . $iOffset . "_PROXY=\"" . $sipProxy . "\"\n";


    echo "LINE" . $i . "_OUT_INTERVAL=\"" . $gsmWaitIntervalStart . "\"\n";
    echo "LINE" . $i . "_OUT_INTERVAL2=\"" . $gsmWaitIntervalStop . "\"\n";
    echo "LINE" . $i . "_OUTX_S=\"" . $gsmCountCalls . "\"\n";
    echo "LINE" . $i . "_O_SLEEP_MODE=\"" . $gsmSleepMode . "\"\n";

    echo "L" . $i . "_GSM_PIN=\"" . $gsmPin1 . "\"\n";
    echo "L" . $i . "_GSM_PIN2=\"" . $gsmPin2 . "\"\n";


    echo "L" . $i . "_GSM_CF_UNCND_ENABLE=\"" . $gsmCallForwardEnable . "\"\n";
    echo "L" . $i . "_GSM_CF_UNCND_NUM=\"" . $gsmCallForwardNumber . "\"\n";
    echo "L" . $i . "_GSM_CF_BUSY_ENABLE=\"" . $gsmCallForwardEnable . "\"\n";
    echo "L" . $i . "_GSM_CF_BUSY_NUM=\"" . $gsmCallForwardNumber . "\"\n";
    echo "L" . $i . "_GSM_CF_NOREPLY_ENABLE=\"" . $gsmCallForwardEnable . "\"\n";
    echo "L" . $i . "_GSM_CF_NOREPLY_NUM=\"" . $gsmCallForwardNumber . "\"\n";
    echo "L" . $i . "_GSM_CF_NOTREACHABLE_ENABLE=\"" . $gsmCallForwardEnable . "\"\n";
    echo "L" . $i . "_GSM_CF_NOTREACHABLE_NUM=\"" . $gsmCallForwardNumber . "\"\n";
}
