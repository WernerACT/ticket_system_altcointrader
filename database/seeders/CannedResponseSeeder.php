<?php

namespace Database\Seeders;

use App\Models\CannedResponse;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CannedResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cannedResponses = [
            [
                'name' => 'Username already in use',
                'department_id' => 1,
                'body' => 'Please be aware that the selected username may already be in use. Therefore, please register with a different username.

            Please note that you can create a new account using this e-mail address. However, if you have previously registered, we kindly request that you provide us with a copy of your ID. This will enable us to attempt to retrieve your account.'
            ],
            [
                'name' => 'Account recovery email address',
                'department_id' => 1,
                'body' => 'Kindly be aware that the email address you are using to send your message is not registered on AltCoinTrader. To help you recover your account, we kindly request that you furnish us with a copy of your ID or passport.'
            ],
            [
                'name' => 'Account recovery - new email',
                'department_id' => 1,
                'body' => 'Please note that we have sent an email to your registered email address. Kindly state if you have received the email on your registered email so we may further assist.'
            ],
            [
                'name' => 'Account recovery - old email',
                'department_id' => 1,
                'body' => 'Kindly note that this email was sent to recover your AltCoinTrader account. Kindly reply to this email confirming receipt of this email so that we may further assist.'
            ],
            [
                'name' => 'Create a new account (Recovery account not found)',
                'department_id' => 1,
                'body' => 'Please be informed that the account associated with the details provided is still not found. Please create a new account using your new email address.

    To guide you through the registration process on AltCoinTrader, please visit our Help Centre using the following link:'
            ],
            [
                'name' => 'No query stated - Empty email',
                'department_id' => 1,
                'body' => 'We have received your email with insufficient content. To provide you with assistance, kindly respond to this email with your query.'
            ],
            [
                'name' => 'No query stated - More info',
                'department_id' => 1,
                'body' => 'Please elaborate on your inquiry and provide us with any additional information including screenshots in order for us to further assist.'
            ],
            [
                'name' => 'Working on query',
                'department_id' => 1,
                'body' => 'We have acknowledged your query and are currently working on the matter. We will provide a solution to your ticket at the earliest possible time. Thank you for your patience and cooperation.'
            ],
            [
                'name' => 'Closing an email',
                'department_id' => 1,
                'body' => 'Please do not hesitate to contact support if you require further assistance with your AltCoinTrader account.'
            ],
            [
                'name' => 'Query resolved telephonically',
                'department_id' => 1,
                'body' => 'Kindly note that this ticket will be closed as your query has been resolved telephonically. Please reply to this email for further information or to reopen the ticket.'
            ],
            [
                'name' => 'New reference generated',
                'department_id' => 1,

                'body' => 'Kindly note that a reference number has been generated for your AltCoinTrader account. Kindly log in to your AltCoinTrader account and navigate to Deposit. You may find your reference number in the green block.'
            ],
            [
                'name' => 'Wallet status',
                'department_id' => 1,
                'body' => 'To check the current status of our listed cryptocurrencies and their maintenance status, kindly click on the link below.'
            ],
            [
                'name' => 'Access denied status page (Cloudflare)',
                'department_id' => 1,
                'body' => 'To enable us to provide optimal assistance regarding this matter, please furnish us with the following technical details:

    - What is your current geographic location?
    - What is your internet public IP address?
    - To view your internet IP address on the affected device, please use this link: [What is my IP](https://www.google.com/search?q=what+is+my+ip)
    - Are you using a VPN service?
    - Have you attempted to access the website/app from another device within your home/office?

    Kindly reboot your device if the website is functional on another device within your home/office.'
            ],
            [
                'name' => 'The client cannot log in',
                'department_id' => 1,
                'body' => 'In case you encounter difficulties logging in to your account, you may try the following steps:

1. We recommend using Google Chrome as it is the most optimized browser for most websites.
2. Clear all cache, cookies, and other temporary data.
3. Try accessing the website using Chrome\'s incognito mode to determine if the issue persists. Please note that our security protocol logs out any machine that exhibits malicious behavior and may block the associated IP address.
4. Try logging in from an entirely different device, such as a mobile device, tablet, or alternative laptop.

If you are still unable to log in after trying the above quick fixes, kindly send us a screenshot of the error message you are receiving to enable us to provide further assistance.'
            ],
            [
                'name' => 'Deleting an account',
                'department_id' => 1,
                'body' => 'Kindly note that we are unable to delete your account on your behalf. To delete your account, please log in and proceed to your profile. Next, click on Account Settings and select the "Disable Your Account" option. It is recommended that you read the terms and conditions before disabling your account. Additionally, please note that reactivating your account may take up to 28 working days.'
            ],
            [
                'name' => 'Adding new coins',
                'department_id' => 1,
                'body' => 'Our website regularly updates with new coins. Kindly keep a lookout for further updates. Our listing criteria are based on the top-performing coins in the market, as we prioritize offering our clients the best possible service. We do not list new coins unless they have a functional fundamental presence with a long-standing history in the crypto industry. Thank you for your understanding.'
            ],
            [
                'name' => 'Supporting Airdrops',
                'department_id' => 1,
                'body' => 'New coins, including airdrops, are regularly added to our website. Kindly stay tuned for further updates. We announce all supported forks, airdrops, networks, and new coins under our Site News and Airdrops section on the website. Thank you for your understanding.'
            ],
            [
                'name' => 'Not an ACT wallet address',
                'department_id' => 1,
                'body' => 'Kindly be advised that the wallet address you utilised in this transaction is not for your AltCoinTrader account, as a result, these funds were not sent to AltCoinTrader and we can therefore not credit your AltCoinTrader account.

For further assistance, kindly contact the owner or exchange of the wallet address utilised.'
            ],
            [
                'name' => 'No profile for email change (old email)',
                'department_id' => 1,
                'body' => 'Please be aware that we cannot locate an AltCoinTrader account using the information provided. Please provide your username and submit proof of payments for deposits made to your AltCoinTrader account, enabling us to assist you further.'
            ],
            [
                'name' => 'Email change Approved',
                'department_id' => 1,
                'body' => 'Kindly be advised that we have received the necessary document and your request to change your email has been approved.'
            ],
            [
                'name' => '2FA App Code',
                'department_id' => 1,
                'body' => 'Please be informed that your account has 2FA (two-factor authentication) enabled. To log in, you are required to input the 6-digit code displayed on your Google Authenticator app at the time of logging in. It is essential to note that this code is dynamic and will change every 60 seconds.'
            ],
            [
                'name' => '2FA removal (+R50 000 - OTP)',
                'department_id' => 1,
                'body' => 'This message serves to notify you that, considering the substantial funds in your AltCoinTrader account, the system will prompt you to enter a One-Time Password (OTP) sent to your registered cellphone number upon disabling the Two-Factor Authentication (2FA) feature.

Should you wish to proceed with the removal of 2FA from your AltCoinTrader account, kindly reply to this email.'
            ],
            [
                'name' => '2FA successfully removed',
                'department_id' => 1,
                'body' => 'Thank you for providing the necessary documentation.

We have successfully disabled the 2FA feature on your account. Nevertheless, we highly recommend that you prioritize the security of your account by re-enabling the 2FA feature.

Please take note that when activating 2FA on multiple devices or reactivating it on a new device, it is essential to save the Secret Code presented during the 2FA activation process on your AltCoinTrader account under Step 1.'
            ],
            [
                'name' => '2FA removed, verify account',
                'department_id' => 1,
                'body' => 'Your 2FA has successfully been removed from your AltCoinTrader account.

Please note your withdrawals are suspended until your FICA documentation has been verified. Our verification department will contact you soon with further instructions.'
            ],
            [
                'name' => 'Verify account 2FA',
                'department_id' => 1,
                'body' => 'We have received the documents you submitted to remove the 2FA from your account. However, before we can complete the removal process, we need to perform a final security check by verifying your account. Our verification department will be sending you a message shortly.'
            ],
            [
                'name' => 'Securing your account',
                'department_id' => 1,
                'body' => 'You may take the subsequent steps to safeguard your AltCoinTrader account:

- Change your password on AltCoinTrader
- Change the password for the email address associated with your AltCoinTrader account
- Do not disclose your passwords to anyone, including the company\'s personnel with whom you are transacting
- Avoid using the same password on different platforms
- Ensure that you only log in from a secure device
- Do not click on any links that prompt you to update your profile details.'
            ],
            [
                'name' => 'Password-protected documents',
                'department_id' => 1,
                'body' => 'Please be advised that we are unable to accept encrypted documents that require a password. We, therefore, request that you resend the document without any encryption to enable us to offer further assistance in this matter.'
            ],
            [
                'name' => 'Cannot open documents (different format)',
                'department_id' => 1,
                'body' => 'We regret to inform you that we are unable to access your documents. To provide the necessary assistance, please respond to this email by attaching your documents in an alternative format such as jpeg, jpg, or png.'
            ],
            [
                'name' => 'Bank statement for 2FA removal; email change & Security block 67',
                'department_id' => 1,
                'body' => 'Please provide us with a bank statement so that we may further assist you.'
            ],
            [
                'name' => 'Do not accept a Driver\'s License',
                'department_id' => 1,
                'body' => 'Please take note that we are unable to acknowledge a driver\'s license as a valid form of identification. We kindly request that you use your ID book/card or passport instead. Nevertheless, we can accept a valid temporary ID together with an affidavit indicating the reason for not having a standard ID.'
            ],
            [
                'name' => 'The passport number needed to be updated',
                'department_id' => 1,
                'body' => 'Kindly be aware that your previous passport number is still associated with your AltCoinTrader account. Please provide us with a picture of your old passport/ID document to facilitate further assistance.'
            ],
            [
                'name' => 'Personal details differ (Last name)',
                'department_id' => 1,
                'body' => 'Please explain the discrepancy between your ID document\'s last name and your account\'s last name. Additionally, kindly submit all relevant supporting documents to facilitate our further assistance.'
            ],
            [
                'name' => 'Account hold removed',
                'department_id' => 1,
                'body' => 'Please be informed that the suspension on your AltCoinTrader account withdrawals has been lifted, and you can now access your withdrawals.'
            ],
            [
                'name' => 'Receiving log in emails',
                'department_id' => 1,
                'body' => 'Please confirm whether you receive e-mail notifications indicating a successful login when you access your AltCoinTrader account. This information will help us provide further assistance accordingly.'
            ],
            [
                'name' => 'Request to cancel clients withdrawal',
                'department_id' => 1,
                'body' => 'Kindly state if we may cancel your withdrawal. This will enable you to initiate a new withdrawal and receive a fresh confirmation for the transaction.'
            ],
            [
                'name' => 'Withdrawal confirmation resend',
                'department_id' => 1,
                'body' => 'Please be advised that you can resend your email confirmation by following these simple steps:

1. Sign in to your AltCoinTrader account.
2. Navigate to "History," then click on "Withdrawals."
3. Locate the withdrawal that requires confirmation and select the "Resend Confirmation" button.

If you cannot locate the confirmation email in your inbox, please check your spam folder, and remember to mark it as "not spam."

If you have any additional questions, please do not hesitate to reply to this email. Kindly refrain from creating a new email.'
            ],
            [
                'name' => 'Issue confirming withdrawal',
                'department_id' => 1,
                'body' => 'Please be advised that your withdrawal has been successfully confirmed.

It is possible that you may have encountered an error message if you accidentally clicked the confirmation button twice or experienced a network issue while confirming your withdrawal.'
            ],
            [
                'name' => 'Withdrawal Refund',
                'department_id' => 1,
                'body' => 'We apologize for the inconvenience caused. Our investigation shows that your withdrawal failed to be broadcasted to the network, and as a result, we have canceled and refunded the withdrawal back to your account.

We kindly request that you initiate a new withdrawal and click on the confirmation email that will be sent to your registered email address to ensure a successful transaction.'
            ],
            [
                'name' => 'Invalid wallet address invalid',
                'department_id' => 1,
                'body' => 'Kindly be advised that the wallet address you utilised for your withdrawal is invalid, and as a result, your attempt to broadcast the withdrawal to the network has failed. Therefore, we have initiated the cancellation of your withdrawal and issued a refund back to your account.

Please make a new withdrawal and click on the confirmation email that will be sent to your registered email address. It is essential that you verify the correctness of the wallet address you enter before confirming your withdrawal.'
            ],
            [
                'name' => 'Missing/invalid destination tag',
                'department_id' => 1,
                'body' => 'We would like to inform you that the destination tag you entered is either missing or invalid. As a result, your withdrawal request could not be successfully processed and broadcasted to the network. Consequently, we have canceled your withdrawal and refunded the amount back to your account.

To proceed with a new withdrawal, please initiate the process again and ensure that you enter a valid destination tag. It is crucial that you verify the accuracy of the destination tag before confirming your withdrawal. Additionally, kindly click on the confirmation email that will be sent to your registered email address to complete the withdrawal process.'
            ],
            [
                'name' => 'Withdrawal reversal requested',
                'department_id' => 1,
                'body' => 'Kindly be advised that your withdrawal has been processed and cannot be reversed.'
            ],
            [
                'name' => 'Cancelled Withdrawal',
                'department_id' => 1,
                'body' => 'We have cancelled your withdrawal and processed a refund back to your account. We kindly ask that you initiate a new withdrawal.'
            ],
            [
                'name' => 'Withdrawal or deposit',
                'department_id' => 1,
                'body' => 'Please indicate whether your inquiry is regarding a withdrawal (transferring funds from AltCoinTrader to another platform) or a deposit (transferring funds from another platform to AltCoinTrader).'
            ],
            [
                'name' => 'Bank statement/ confirmation letter for updating banking details',
                'department_id' => 1,
                'body' => 'Kindly furnish us with a bank statement or confirmation letter displaying your banking details. This information will aid us in updating your banking details for your AltCoinTrader account.'
            ],
            [
                'name' => 'Banking details successfully updated',
                'department_id' => 1,
                'body' => 'Please take note that your banking details have been updated as requested. We kindly advise you to double-check the information to ensure its accuracy before making any withdrawal.'
            ],
            [
                'name' => 'Account credited',
                'department_id' => 1,
                'body' => 'We regret any inconvenience caused. Your AltCoinTrader account has been successfully credited.'
            ],
            [
                'name' => 'Nigeria Withdrawal',
                'department_id' => 1,
                'body' => 'Kindly be informed that a withdrawal was made from an IP address located in a jurisdiction considered to be high-risk. If this was done by you, please provide us with your IP address and a photo of yourself holding your ID document beside your face, along with a handwritten note that states "AltCoinTrader.co.za, unblock the account, the IP address, and today\'s date." Please ensure that your name, surname, and ID number are clearly visible and not obstructed by your finger or the camera flash.'
            ],
            [
                'name' => '3rd party traders/brokers',
                'department_id' => 1,
                'body' => 'Kindly note that AltCoinTrader does not have brokers/agents representing us or trading on behalf of our clients. Additionally, we do not charge any fees beyond those listed on our fees page. Please be aware that trading on behalf of another individual, as well as third-party deposits and withdrawals, are strictly prohibited on our platform.

We kindly request that you provide us with all information regarding the person/account you made the deposit to, as well as proof of payments for the deposit, so that we may launch an investigation.'
            ],
            [
                'name' => 'Requesting ETH & BNB wallet addresses before requesting USDT',
                'department_id' => 1,
                'body' => 'Please be aware that before you can request your USDT wallet address, you must first request your wallet addresses for ETH (Ethereum) and BNB (Binance Coin). Once you have obtained your ETH and BNB wallet addresses, you can request your USDT wallet address again.'
            ],
            [
                'name' => 'Same wallet address for different coins (Same network)',
                'department_id' => 1,
                'body' => 'Kindly note that coins within a shared network share identical wallet addresses due to the nature of their network. For instance, your wallet addresses for ETH, USDT (ERC20), and xZAR (ERC20) will coincide because they are all part of the Ethereum network. Similarly, within the Binance network, BNB, USDT (BEP20), and xZAR (BEP20) will all utilize the same wallet address.'
            ],
            [
                'name' => 'Internal withdrawal',
                'department_id' => 1,
                'body' => 'We can confirm that the funds have been successfully received by the intended recipient as you have made an internal withdrawal to another AltCoinTrader account holder.'
            ],
            [
                'name' => 'International IP address',
                'department_id' => 1,
                'body' => 'We have observed a login attempt to your account from an international IP address and have implemented measures to safeguard your account. For your protection, we have temporarily placed a hold on your account. If you made this login attempt, please provide us with an explanation so that we may remove the hold.

We highly recommend that you add two-factor authentication to your account to further enhance your account\'s security.'
            ],
            [
                'name' => 'Successful open order',
                'department_id' => 1,
                'body' => 'Kindly be aware that you had an open order when you submitted your query. Please inform us if your query has been resolved so we can provide additional assistance.'
            ],
            [
                'name' => 'Reprocess order',
                'department_id' => 1,
                'body' => 'Please be advised that the transaction needs to be reprocessed due to the failure of the blockchain transaction.'
            ],
            [
                'name' => 'Fast Track Level 3',
                'department_id' => 1,
                'body' => 'Kindly note that as per your request, your withdrawal limit has been increased and your AltCoinTrader account is now on level 3 with a 24-hour withdrawal limit of R1 000 000.00.'
            ],
            [
                'name' => 'Level 4 request failed',
                'department_id' => 1,
                'body' => 'To elevate your AltCoinTrader account to level 4, granting you a custom withdrawal limit, you must possess an Estimated Portfolio Value of at least R1 000 000.00 (R1 Million). Also, please ensure your account is verified and have enabled 2FA (two-factor authentication) on your account.'
            ],
            [
                'name' => 'Wallet under maintenance',
                'department_id' => 1,
                'body' => 'We would like to inform you that the wallet is currently undergoing maintenance. We apologise for any inconvenience this may cause. Our technical team is working diligently to resolve the issue as soon as possible. While we do not have an estimated timeline for when the wallet will be operational again, we want to assure you that your funds are secure and that we are doing everything we can to address the matter promptly.

Please note that the deposits will be credited and withdrawals will be processed and sent out once the wallet is no longer under maintenance. We appreciate your patience and understanding during this time.'
            ],
            [
                'name' => 'Provide us with TXID',
                'department_id' => 1,
                'body' => 'Please provide us with the transaction hash/Transaction ID from your sending platform by copying and pasting it into your response to this email. Kindly also state the name and amount of the coin and the network used.

The Transaction/Hash ID is a unique identification number of 64 or more characters that serves as proof of payment and can help you trace a transaction on the blockchain. You can request this information from the sending platform.'
            ],
            [
                'name' => 'TXID with no deposit information',
                'department_id' => 1,
                'body' => 'To provide further assistance, kindly provide the cryptocurrency\'s name and the specific date and amount of the transaction.'
            ],
            [
                'name' => 'No Memo tag on deposit (XRP)',
                'department_id' => 1,
                'body' => 'In order for us to further assist, please provide us with a screenshot from the sending platform showing this transaction.'
            ],
            [
                'name' => 'TXID not wallet address',
                'department_id' => 1,
                'body' => 'It appears that you have provided us with a wallet address instead of a transaction ID.

A Transaction/Hash ID is a unique 64-character identification number assigned to a transaction. It serves as proof of payment and helps trace a transaction on the blockchain. Kindly request this information from the sending platform.'
            ],
            [
                'name' => 'What is a TXID',
                'department_id' => 1,
                'body' => 'A Transaction/Hash ID is a unique 64-character identification number assigned to a transaction. It serves as proof of payment and helps trace a transaction on the blockchain. Kindly request this information from the sending platform.'
            ],
            [
                'name' => 'TXID screenshot',
                'department_id' => 1,
                'body' => 'We kindly request that you provide us with the transaction ID for your deposit pasted in a reply to this email as we are unable to extract information from a screenshot.

A Transaction/Hash ID is a unique 64-character identification number assigned to a transaction. It serves as proof of payment and helps trace a transaction on the blockchain. Kindly request this information from the sending platform.'
            ],
            [
                'name' => 'Funds returned from receiver',
                'department_id' => 1,
                'body' => 'Once the funds have been refunded please provide us with a screenshot from the receiving platform sending the coins back along with the TXID pasted in a reply to this email so that we may credit your AltCoinTrader account.

Kindly note that once we have received the necessary information as requested above, your AltCoinTrader account will be credited with the amount that the receiving platform has returned to AltCoinTrader.'
            ],
            [
                'name' => 'Security block (67)',
                'department_id' => 1,
                'body' => 'Please be advised that your account has been temporarily blocked as a security measure due to the activation of the "Block my account" option in our notification emails.

To facilitate the unblocking process, we kindly request that you provide the reason for the account block. Additionally, for verification purposes, we require a photograph of yourself holding your original ID document next to your face, along with a handwritten note bearing the following information:

"AltCoinTrader.co.za,"
"Remove security block," and
today\'s date.

It is essential that the details on your ID document, such as your name, surname, and ID number, are legible and not obscured by fingers or camera flash. Moreover, please confirm that the information in the picture is not mirrored or flipped. Your prompt cooperation in providing these details will assist us in swiftly resolving this matter and restoring access to your account.'
            ],
            [
                'name' => 'Verify account Security 67',
                'department_id' => 1,
                'body' => 'We have received the documents you submitted to unblock your account. However, before we can complete the process, we need to perform a final security check by verifying your account. Our verification department will be sending you a message shortly.'
            ],
            [
                'name' => 'Account activated',
                'department_id' => 1,
                'body' => 'Please be aware that your AltCoinTrader account has been successfully activated. You can now access it by logging in with your email address or username and password.'
            ],
            [
                'name' => 'Request screenshot',
                'department_id' => 1,
                'body' => 'Kindly provide us with a screenshot of the error message you are receiving so that we can provide further assistance.'
            ],
            [
                'name' => 'IP/Country block',
                'department_id' => 1,
                'body' => 'Please provide us with the IP address and a screenshot of the error page you are receiving in order for us to assist you.'
            ],
            [
                'name' => 'IP unblocked',
                'department_id' => 1,
                'body' => 'Kindly note that your IP address has been unblocked.

You will be able to log in to your account.'
            ],
            [
                'name' => 'Dynamic Fee',
                'department_id' => 1,
                'body' => 'Transferring ERC20 tokens is determined by the Ethereum network. These tokens require a dynamic fee to be sent quickly and efficiently. We determine the fee by examining the current network fee to ensure that your withdrawal will be processed successfully.'
            ],
            [
                'name' => 'AltCoinTrader coins are stored in Cold storage',
                'department_id' => 1,
                'body' => 'It is important to note that your coins are kept completely safe as they are not stored on the exchange. Instead, they are stored in a cold storage wallet that is kept off of the exchange. We only keep a float to pay withdrawals on the exchange.'
            ],
            [
                'name' => 'Troubleshoot emails',
                'department_id' => 1,
                'body' => 'Please note that there are several reasons why emails may not be sent with attachments, including attachment size limits, browser or extension issues, and network problems. Here are some possible solutions to these issues:

1. Check the attachment size limit:
Firstly, ensure that the size of the attachment you are trying to send does not exceed the limit. Gmail allows attachments up to 25 MB in size, but for support queries, we can only accept documents up to 5 MB.

2. Update or Change Web Browser
If you\'re having trouble sending attachments on Gmail, you should check your web browser. Keep in mind that Gmail is only supported on Chrome, Firefox, Safari, Internet Explorer, and Microsoft Edge browsers.
Ensure that you have the latest version of your web browser by checking for updates directly in the browser or by visiting the developer\'s website. For example, on Chrome, you can check for updates by typing "Chrome://help" in the address bar.
If the issue persists on one browser, consider switching to another browser to see if that resolves the problem. Sometimes, attaching files works fine in an alternative browser, so try opening Gmail in another browser and attach the file to an email.

3. Disable the Web Browser Proxy
If you have set up a web browser proxy, it could be causing issues with sending attachments on Gmail. Try disabling the proxy server by following these steps:
3.1. Click the search button on the Windows 10 taskbar and search for \'internet options\'.
3.2. Select \'Internet properties\' from the search results and click the \'Connections\' tab.
3.3. Click the \'LAN settings\' button.
3.4. Look for \'Use a proxy server for your LAN\' setting and deselect the box beside it.

If the error message indicates that the issue may be due to a proxy server, switching off the browser proxy may resolve the error.

Apart from these solutions, it is also essential to check your internet connection as sometimes attachment errors could be due to network problems.'
            ],
            [
                'name' => 'OTP email received',
                'department_id' => 1,
                'body' => 'Kindly note that your OTP email was delivered to your email address, kindly refresh your inbox and check your spam folder.'
            ],
            [
                'name' => 'OTP limit exceeded',
                'department_id' => 1,
                'body' => 'Kindly note that you have exceeded the number of times requesting the OTP for your withdrawal. Kindly log out of your account, then log back into your account and retry to initiate your withdrawal.'
            ],
            [
                'name' => 'OTP test SMS',
                'department_id' => 1,
                'body' => 'We want to inform you that we have sent a test SMS to the number updated on your AltCoinTrader account to check if you can receive messages from AltCoinTrader.

Please confirm if you have received the test SMS, so we can provide further assistance as needed. Thank you for your cooperation.'
            ],
            [
                'name' => 'Received test SMS',
                'department_id' => 1,
                'body' => 'Please attempt to log in again to your AltCoinTrader account to receive the login OTP.'
            ],
            [
                'name' => 'DNC list',
                'department_id' => 1,
                'body' => 'In order to check if your cellphone number is on the DNC list, kindly follow the instructions below:

1. Dial *120*69269#
2. Press 1
3. If your number is on the list, please remove your cellphone number from the list in order to receive our SMSs.'
            ],
            [
                'name' => 'Update cellphone number selfie',
                'department_id' => 1,
                'body' => 'To update your cellphone number, kindly state your cellphone number in response to this email. Please also provide us with a picture of yourself holding your original ID document/valid passport and a handwritten piece of paper stating

“AltCoinTrader.co.za”,
“Update cellphone number” and
today\'s date.'
            ],
            [
                'name' => 'Cellphone number successfully updated',
                'department_id' => 1,
                'body' => 'Please take note that your cellphone number has been updated as requested. We kindly advise you to double-check the information to ensure its accuracy.'
            ],
            [
                'name' => 'Error 108',
                'department_id' => 1,
                'body' => 'We suggest that you try to log in to your account again several times.

Please keep in mind that you will receive an email asking you to approve your login. Once you approve the login via the email, you should be able to log in successfully. Thank you for your patience and cooperation in this matter.'
            ],
            [
                'name' => 'VPN',
                'department_id' => 1,
                'body' => 'We would like to inform you that your VPN could be active when you attempt to log in to your AltCoinTrader account, which may cause your login IP address to differ from your current IP address.

Please let us know if you are currently using a VPN, so we can assist you further.'
            ],
            [
                'name' => 'Cold storage devices',
                'department_id' => 1,
                'body' => 'We would like to inform you that we are unable to offer advice on third-party devices or wallets. Please be aware that you will need to conduct your own research and due diligence when it comes to utilising these cold storage devices. Thank you for your understanding.'
            ],
            [
                'name' => 'Investments',
                'department_id' => 1,
                'body' => 'Please be informed that our platform does not provide investment options. We solely serve as a medium for interested buyers and sellers to trade cryptocurrencies.'
            ],
            [
                'name' => 'Contacting the Client',
                'department_id' => 1,
                'body' => 'We attempted to reach you at the number listed on your profile, but unfortunately, we were unsuccessful. To assist with your inquiry, kindly furnish us with an updated cellphone number and specify a suitable time for us to contact you. Alternatively, you may reach us at +27 11 568 2684.'
            ],
            [
                'name' => 'Funds returned from receiver',
                'department_id' => 1,
                'body' => 'Once the funds have been refunded please provide us with a screenshot from the receiving platform sending the coins back along with the TXID pasted in a reply to this email so that we may credit your AltCoinTrader account.

Kindly note that once we have received the necessary information as requested above, your AltCoinTrader account will be credited with the amount that the receiving platform has returned to AltCoinTrader.'
            ],
            [
                'name' => 'Technical difficulties resolved',
                'department_id' => 1,
                'body' => 'Please be aware that we encountered technical difficulties, but they have since been resolved. We value your patience and understanding.'
            ],
            [
                'name' => 'Technical difficulties',
                'department_id' => 1,
                'body' => 'We apologise for any inconvenience this may cause. Our technical team is working diligently to resolve the issue as soon as possible.'
            ],
            [
                'name' => 'Easy Loans',
                'department_id' => 1,
                'body' => 'Please note that the easy loans feature is currently under the test phase and will be reinstated as soon as we have a viable solution and the best outcomes for all clients.

Please also note that due to current cryptocurrency market conditions, the lending of funds has been temporarily paused to protect customers from potential market downturns. You can still service existing loans by making repayments, depositing, and/or withdrawing collateral.'
            ],
            [
                'name' => 'Bot trading',
                'department_id' => 1,
                'body' => 'Kindly be informed that at present, trading bots are not supported on the AltCoinTrader Exchange. Nevertheless, we continuously strive to enhance our platform by introducing new functionalities. Please check our website news section for any future developments.'
            ],
            [
                'name' => 'Price Alert Feature',
                'department_id' => 1,
                'body' => 'Currently, our platform does not offer a price alert feature. Nevertheless, we are constantly striving to enhance the platform with additional functionalities. For future updates, we suggest keeping an eye on our site news.'
            ],
            [
                'name' => 'Standard Bank swift code',
                'department_id' => 1,
                'body' => 'Please be informed that to make a deposit via Swift to our Standard Bank account, please use the following Swift code:
Standard Bank SWIFT Code: SBZAZAJJ'
            ],
            [
                'name' => 'BitCoin Legacy Address',
                'department_id' => 1,
                'body' => 'Please be informed that there are currently two formats of BTC addresses available. To ensure a successful deposit, we advise that you contact the platform you intend to deposit to and confirm which format of the BTC address they accept.

In case your personal AltCoinTrader BTC deposit address is invalid, you can use your personal AltCoinTrader BTC Legacy address (Base58) deposit address to make a BTC deposit to your AltCoinTrader account.'
            ],
            [
                'name' => 'International IP address',
                'department_id' => 1,
                'body' => 'We have observed a login attempt to your account from an international IP address and have implemented measures to safeguard your account. For your protection, we have temporarily placed a hold on your account. If you made this login attempt, please provide us with an explanation so that we may remove the hold.

We highly recommend that you add two-factor authentication to your account to further enhance your account\'s security.'
            ],
            [
                'name' => 'Website not opening',
                'department_id' => 1,
                'body' => 'We regret the inconvenience caused. It appears that certain ISP connections may be experiencing issues. We kindly request that you try using a different connection other than the one you are currently using. If this does not resolve the issue, please clear your browser cookies and cache, close your browser, and try again.
If the problem persists, please provide us with a screenshot of the error message you are receiving.'
            ],
            [
                'name' => 'Graph not updated',
                'department_id' => 1,
                'body' => 'Kindly note that the graph on our website has been updated. If you are still seeing the old graph, please refresh your page. If the issue persists, please send us a screenshot of the problem so that we can forward it to our technical team. We apologise for any inconvenience this may have caused.'
            ],
            [
                'name' => 'Progress on investment',
                'department_id' => 1,
                'body' => 'Kindly note that the value of your portfolio is closely linked to the price fluctuations of the coins you hold. If the price of a particular coin, such as Bitcoin, increases from the price at which you bought it, then the value of your portfolio will also increase and vice versa. To monitor these changes, you can go to the Balances/Trade History section.'
            ],
            [
                'name' => 'What is volume?',
                'department_id' => 1,
                'body' => 'The term "volume" refers to the quantity of coins or tokens that have been traded on the AltCoinTrader exchange within the last 24 hours.'
            ],
            [
                'name' => 'TAX',
                'department_id' => 1,
                'body' => 'At present, the responsibility of declaring the proceeds obtained from cryptocurrency trades lies solely with the trader and not AltCoinTrader. It is important that traders declare all their cryptocurrency trading proceeds when filing their tax returns.'
            ],
            [
                'name' => 'Replying to log-in emails',
                'department_id' => 1,
                'body' => 'Please be informed that these emails are automated, and you do not need to respond unless there has been an unauthorised login attempt on your account. This is a security measure that we implement and will be sent to you every time you access your AltCoinTrader account.'
            ],
            [
                'name' => 'Deposit from ATM',
                'department_id' => 1,
                'body' => 'Please be advised that you can make deposits via ATM. However, kindly note that when entering the account number, please exclude the first digit, which is "0." Then, proceed with the remaining digits while also including your unique reference number to ensure that your deposit is correctly allocated.'
            ],
            [
                'name' => 'Statements & letterheads',
                'department_id' => 1,
                'body' => 'Please state the purpose of these documents.

Additionally, kindly indicate the specific start and end dates and the names of the cryptocurrencies for which you need this document. Lastly, please specify if you require the statement for deposits, withdrawals, or trades so we can assist you accordingly.'
            ],
            [
                'name' => 'Statements & letterheads provided',
                'department_id' => 1,
                'body' => 'Please be aware that your Trade, Deposit, and Withdrawal history will be sent to you shortly.'
            ],
            [
                'name' => 'Keeping records',
                'department_id' => 1,
                'body' => 'Kindly note that we are obliged by the FSCA to retain all records for at least 5 years after account closure.'
            ],
            [
                'name' => 'XAU & XAG',
                'department_id' => 1,
                'body' => 'The coins should be collected from our office via a courier service. To facilitate the preparation of the package, kindly inform us of the scheduled pickup time for the coins by the courier service.

Address:
HighCliff Office Level 2 Unit 11
53 Wilhelmina Ave,
Allen\'s Nek,
Roodepoort,
1709'
            ],
            [
                'name' => 'Finding account balance',
                'department_id' => 1,
                'body' => 'Please note that you have to log into your account and click on the wallet tab on the menu. You will then be able to view your balance on your account.'
            ],
            [
                'name' => 'BTC Network fees',
                'department_id' => 1,
                'body' => 'As Bitcoin network fees increase, withdrawal costs for BTC also increase. To ensure that users\' Bitcoin network withdrawals are picked up and processed by mining pools, the withdrawal fee must be increased on the platform.'
            ],
            [
                'name' => 'Why do buy & current buy offers have a price difference?',
                'department_id' => 1,
                'body' => 'Please note that the current buy offers are clients willing to buy the coins you wish to sell. The current sell offers are offers of clients willing to buy the coins you wish to sell. Consequently, the buy price will align with the current sell offers, while the sell price will align with the current buy offers.'
            ],
            [
                'name' => 'Error 112',
                'department_id' => 1,
                'body' => 'Kindly be aware that this error could arise due to various reasons:

Failure to input any values.
Presence of a space or punctuation error.
AltCoinTrader being accessed simultaneously on multiple browsers/devices.
An incomplete statement regarding the last point.

To rectify this issue, you may consider the following steps:

Enter your values without incorporating spaces or commas.
Close all AltCoinTrader tabs across all browsers, and clear cache, cookies, and other temporary data.'
            ],
            [
                'name' => 'Suspicious email 1',
                'department_id' => 1,
                'body' => 'Please note that we require you to answer the below question in order for us to further assist you.

How did you hear about Altcointrader?

Were you referred by anyone to Altcointrader?

Were you approached by anyone on social media (i.e. whatsapp, tik tok, facebook, twitter, Instagram) with regards to trading, loan application or job application?

Do you have any other trading account that requires you to open an account with AltCoinTrader?

Is there anyone assisting you with your account or with trading and providing you with trading advice?

Where will you be sending/moving your coins to once you start buying/trading on our platform or will you leave it in your Altcointrader account?

Whose cellphone number is registered on your profile?

Kindly state how many cellphone numbers you have and provide them to us.'
            ],
            [
                'name' => 'Suspicious email 2',
                'department_id' => 1,
                'body' => 'Please note that for security purposes we need you to provide us with the source of your funds, which is the bank statement of the account from which the deposits were made as well as the last 2 proof of payments made to us.

Kindly respond to this same email to avoid creating multiple tickets please.'
            ],
            [
                'name' => 'Suspicious email 3',
                'department_id' => 1,
                'body' => 'Please note that for security purposes we need you to provide us with the source of your funds, which is the bank statement of the account from which the deposits were made as well as the last 2 proof of payments made to us.

Please state where you are trying to access this account from and provide us with your IP address in order for us to further assist you.'
            ]
        ];

        foreach ($cannedResponses as $response) {
            $response['suggested_status_id'] = 4;
            CannedResponse::create($response);
        }
    }
}
