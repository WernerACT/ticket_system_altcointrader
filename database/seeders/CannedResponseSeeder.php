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
            ],
            [
                'name' => 'Nigerian Blacklist',
                'department_id' => 4,
                'body' => 'Kindly state where you are attempting to withdraw/ access your account from and provide us with your IP address.

Please note that for security purposes we need you to provide us with the source of your funds, which is the bank statement of the account from which the deposits were made and the proof of payments made to us.'
            ],
            [
                'name' => 'Possible Compromised Account',
                'department_id' => 4,
                'body' => 'Kindly be advised that your account was flagged as compromised. Please note that we require you to send us a picture of yourself holding your ID next to your face with a handwritten piece of paper, where you have written todays date, AltCoin Trader, and unblock your account.

    Visit our help center to see an idea of how to take the requested picture

Kindly activate 2-factor authentication as well on your account.

Please respond to this same email to avoid creating multiple tickets.'
            ],
            [
                'name' => 'Trader over 60',
                'department_id' => 4,
                'body' => 'Kindly be advised that your account was flagged as compromised. Please note that we require you to send us a picture of yourself holding your ID next to your face with a handwritten piece of paper, where you have written todays date, AltCoin Trader, and permit withdrawal.

    Visit our help center to see an idea of how to take the requested picture;

Kindly respond to this same email to avoid creating multiple tickets.'
            ],
            [
                'name' => 'Third-party deposit',
                'department_id' => 4,
                'body' => 'Please kindly note that third-party deposits/withdrawals are not allowed as they open up an avenue for traders to be scammed/defrauded under the cover of one trading for/buying coins on their behalf. All traders are encouraged to have their accounts and trade on this platform.

Please note that we will require a signed affidavit from the individual who has deposited to your account confirming exactly whose account they have deposited to, the amounts that they have deposited as well as the reason why they deposited to this account, along with their proof of payments.

Please note that the required signed affidavit from the individual should contain the below and not AltCoinTrader details:
- Your name and surname
- your ID number
- your AltCoinTrader reference number
- amount deposited
- reason for deposit in your account
- state that they are fully aware that Altcoin Trader will not be held liable
- their proof of payments

Please note that once the affidavit has been written out we will then require a selfie of them holding the affidavit and their ID next to their faces all in one picture.'
            ],
            [
                'name' => 'Confirm SOF',
                'department_id' => 4,
                'body' => 'Please note that for security purposes we need you to provide us with the source of your funds, which is the PDF bank statement of the account from which the deposits were made reflecting the payments made to Altcointrader as well as the below downloaded PDF proof of payments made to us.

Please note: The proof of payment should contain the following information:

* Date of Payment
* Amount
* Account number where the money was paid to
* The reference that was used for AltCoinTrader

Please bear in mind that a screenshot of the payment/bank statement is not acceptable as this does not contain all the information required.

Kindly respond to this same email to avoid creating multiple tickets.'
            ],
            [
                'name' => 'Incorrect SOF sent to us',
                'department_id' => 4,
                'body' => 'Please note that we are unable to accept the attachments you have sent us because we need the actual PDF copies of your proof of payment and your bank statement showing the transaction coming out of your account please.

Kindly respond to this same email to avoid creating multiple tickets, please.'
            ],
            [
                'name' => 'IP related blacklist',
                'department_id' => 4,
                'body' => 'Please state where you are trying to access this account from and provide us with your IP address for us to further assist you.

If the client provides us with an international IP address:

Please note we have noticed a login to your account from an international IP address, we have taken steps to place a hold on your account for your safety, if this login was made by yourself please explain to us the reason for this.

By adding 2-factor authentication to your account, your account will be more secure.

If the IP address sent is sufficient:

Please send us a picture of yourself holding your ID document next to your face and a piece of paper written AltCoinTrader and todays date.

    Please make sure that the details ie. Your name, surname, and ID number are visible and not obstructed by your finger or the flash of the camera.'
            ],
            [
                'name' => 'VPN related blacklist',
                'department_id' => 4,
                'body' => 'Please provide us with your public IP address and not a VPN or private IP address for us to further assist you.

If the client once again sends a VPN address:

Kindly confirm if you are using a VPN to log in to this account as well as why you are using a VPN if this is the case, as your account was flagged as possibly compromised due to suspicious logins from a VPN network.'
            ],
            [
                'name' => 'Suspicious Address',
                'department_id' => 4,
                'body' => 'Please note that we require you to answer the below question for us to further assist you.

How did you hear about Altcointrader?
Were you referred by anyone to Altcointrader?
Were you approached by anyone on social media (i.e. WhatsApp, tik tok, Facebook, Twitter, Instagram)
Do you have any other trading account that requires you to open an account with AltCoinTrader?
Is there anyone assisting you with your account or with trading
Where will you be sending/moving your coins to once you start buying/trading on our platform or duwill you leave it in your Altcointrader account?

If all checks out:
(If there are ZAR deposits)

Please note that for security purposes we need you to provide us with the source of your funds, which is the bank statement of the account from which the deposits were made as well as the proof of payments made to us.

And:

Please note for us to remove the hold on this account we require a picture of yourself holding your ID next to your face as well as a piece of paper with the words AltCoinTrader, remove the hold and todays date.

    (If there are no ZAR deposits)

Please note for us to remove the hold on this account we require a picture of yourself holding your ID next to your face as well as a piece of paper with the words AltCoinTrader, remove the hold and todays date.'
            ],
            [
                'name' => 'Suspicious Domain',
                'department_id' => 4,
                'body' => 'Please note that we require you to answer the below question for us to further assist you.

How did you hear about Altcointrader?
Were you referred by anyone to Altcointrader?
Were you approached by anyone on social media (i.e. WhatsApp, tik tok, Facebook, Twitter, Instagram)
Do you have any other trading account that requires you to open an account with AltCoinTrader?
Is there anyone assisting you with your account or with trading
Where will you be sending/moving your coins to once you start buying/trading on our platform or will you leave it in your Altcointrader account?

If all checks out:

(If there are ZAR deposits)

Please note that for security purposes we need you to provide us with the source of your funds, which is the bank statement of the account from which the deposits were made as well as the proof of payments made to us.

And:

Please note for us to remove the hold on this account we require a picture of yourself holding your ID next to your face as well as a piece of paper with the words AltCoinTrader, remove the hold and todays date.

    (If there are no ZAR deposits)

Please note for us to remove the hold on this account we require a picture of yourself holding your ID next to your face as well as a piece of paper with the words AltCoinTrader, remove the hold and todays date.'
            ],
            [
                'name' => 'Suspicious Keyword',
                'department_id' => 4,
                'body' => 'Please note that we require you to answer the below question for us to further assist you.

How did you hear about Altcointrader?
Were you referred by anyone to Altcointrader?
Were you approached by anyone on social media (i.e. WhatsApp, tik tok, Facebook, Twitter, Instagram)
Do you have any other trading account that requires you to open an account with AltCoinTrader?
Is there anyone assisting you with your account or with trading
Where will you be sending/moving your coins to once you start buying/trading on our platform or will you leave it in your Altcointrader account?

If all checks out:

(If there are ZAR deposits)

Please note that for security purposes we need you to provide us with the source of your funds, which is the bank statement of the account from which the deposits were made as well as the proof of payments made to us.

And:

Please note for us to remove the hold on this account we require a picture of yourself holding your ID next to your face as well as a piece of paper with the words AltCoinTrader, remove the hold and todays date.

    (If there are no ZAR deposits)

Please note for us to remove the hold on this account we require a picture of yourself holding your ID next to your face as well as a piece of paper with the words AltCoinTrader, remove the hold, and todays date.'
            ],
            [
                'name' => 'Suspicious country code',
                'department_id' => 4,
                'body' => 'Please note that we require you to answer the below question for us to further assist you.


How did you hear about Altcointrader?
Were you referred by anyone to Altcointrader?
Were you approached by anyone on social media (i.e. WhatsApp, tik tok, Facebook, Twitter, Instagram)
Do you have any other trading account that requires you to open an account with AltCoinTrader?
Is there anyone assisting you with your account or with trading
Where will you be sending/moving your coins to once you start buying/trading on our platform or will you leave it in your Altcointrader account?

If all checks out:

(If there are ZAR deposits)

Please note that for security purposes we need you to provide us with the source of your funds, which is the bank statement of the account from which the deposits were made as well as the proof of payments made to us.

And:

Please note for us to remove the hold on this account we require a picture of yourself holding your ID next to your face as well as a piece of paper with the words AltCoinTrader, remove the hold and todays date.

    (If there are no ZAR deposits)

Please note for us to remove the hold on this account we require a picture of yourself holding your ID next to your face as well as a piece of paper with the words AltCoinTrader, remove the hold, and todays date..'
            ],
            [
                'name' => 'Cellphone number linked to multiple profiles',
                'department_id' => 4,
                'body' => 'Please note that we require you to answer the below question for us to further assist you.

- How did you hear about Altcointrader?
- Were you referred by anyone to Altcointrader? - Were you approached by anyone on social media (i.e. WhatsApp, TikTok, Facebook, Twitter, Instagram) with regards to trading, loan application, or job application?
- Do you have any other trading account that requires you to open an account with AltCoinTrader?
- Is there anyone assisting you with your account or with trading and providing you with trading advice?
- Where will you be sending/moving your coins to once you start buying/trading on our platform or will you leave it in your Altcointrader account?
- Whose cellphone number is registered on your profile?
- Kindly state how many cellphone numbers you have and provide them to us.

If all checks out:

Kindly be advised that because your details have been compromised we do require an affidavit from you in this regard for us to verify your account and terminate his account.

The affidavit should state what you have advised us below

- why is your cell number registered on someone elses profile
    - who is the person( Full name and surname with ID number)
- where did you meet the person
    - how would you like us to further assist you
    - That you - the owner of the cell phone number - take full responsibility for us removing the hold on your account and terminating the other account.

    Kindly be advised that we need you to send us a picture of yourself holding your ID next to your face with the affidavit, please.'
            ],
            [
                'name' => 'Bank reported fraud/ As per #HD',
                'department_id' => 4,
                'body' => 'Please note that we are unable to further assist you as the bank reported fraud on your account.

Please have your bank contact us at fraud@altcointrader.co.za about removing the hold on the account.

We are unable to remove the hold unless the bank corresponds with us directly and advises us that the reported transaction is not fraudulent.

If the bank does contact us to remove the hold:

Kindly be advised as per the email from your bank (ACT918389) the hold has successfully been removed from your account as per their request. You are now able to log in successfully and withdraw accordingly.'
            ],
            [
                'name' => 'Scammed/ Possibly Scammed',
                'department_id' => 4,
                'body' => 'Kindly note that AltCoinTrader does not have brokers/agents representing us and/or trading on behalf of clients. Nor do we charge any fees besides those listed on our fees page. Trading on someones behalf, third-party deposits, and third-party withdrawals are not allowed on this platform. Altcoin Trader is a trading platform and not an investment platform or a company that offers loans, jobs, or even requires payments for insurance or withdrawals and has no affiliation with other companies.

    Please provide any information regarding this person account you deposited into as well as proof of payments for the deposits made into the account 021276617 so an investigation can be launched. Kindly be advised that the 9-digit reference number used to make the payment into our Altcoin Trader account held by Standard Bank is a unique reference number that differentiates each clients profile account from one another. Please note that an Altcoin Trader account is similar to ones bank account therefore when funds are being paid into the account it is credited directly to the reference number used.

    Kindly report fraud to your bank and the police please as you have been a victim of a scam.'
            ],
            [
                'name' => 'Compromised 2FA',
                'department_id' => 4,
                'body' => 'Kindly find the below URL link for steps on how to activate the 2 FA on your Altcoin Trader account https://altcointrader.zendesk.com/hc/en-gb/articles/360007179680-How-to-enable-2FA-on-my-AltCoinTrader-account-

Please note that once you have successfully activated 2FA on your account we need you to secure your Google authenticator codes by following the below:

- Going into the Google Authenticator app
- On your right top-hand corner next to the words "Google Authenticator" you will see a cloud with a tick in it and next to it, there is a circle with either your initial or a picture of yourself.
- Please click on the circle and will see a drop-down
- Look for the option that says "use without an account"
- Click on it, then press continue
- Once this is done it will take you back to the original page showing your codes and you will see there is a line running through the cloud

These steps are to be followed accordingly for your codes not to be backed up on your Google account to prevent them from being compromised.'
            ],
            [
                'name' => 'Proof of residence does not match the profile',
                'department_id' => 4,
                'body' => 'Please note that the address on the proof of residence you submitted does not match with the address on the profile, please update your profile for us to verify your account.'
            ],
            [
                'name' => 'ID document does not match the profile',
                'department_id' => 4,
                'body' => 'Please note that the ID Document you submitted does not match the details on the profile, please update your profile for us to remove the hold on your account.'
            ],
            [
                'name' => 'Proof of residence not in the client’s name',
                'department_id' => 4,
                'body' => 'If you do not have any documentation in your name as you live with someone else, please upload an affidavit stamped from the Commissioner of Oaths from the owner of the residence confirming that you reside with them along with the owners utility bill and ID document.'
            ],
            [
                'name' => 'Third-party call',
                'department_id' => 4,
                'body' => 'Kindly be advised that a hold has been placed on your withdrawals as someone else called in regarding your account.

Kindly be advised that we require an affidavit where you have stated the below :

- Who the person is who called in on your behalf,

- What is your relationship with this person?

- Why is this person assisting you with your account?


Kindly be advised that we need you to send us a picture of yourself holding your ID next to your face with the affidavit, please.'
            ],
            [
                'name' => 'Falsified info or edited documentation',
                'department_id' => 4,
                'body' => 'Edited Selfie:

Please note that the picture you’ve sent is incorrect.

Kindly resend a picture of yourself holding your original ID next to your face together with a piece of paper handwritten AltCoinTrader, Unblock Account, and todays date. Make sure that the ID is clear and readable.

    Please make sure that the details ie. Your name, surname, and ID number are visible and not obstructed by your finger or the flash of the camera. Please also ensure that the details in the picture are not flipped around.

    Visit our help center to see an idea of how to take the requested picture
https://altcointrader.zendesk.com/hc/en-gb/articles/360007355279-Picture-of-yourself-holding-your-ID

Kindly respond to this same email to avoid creating multiple tickets please.


    Edited document:

Please note that the document you’ve sent is incorrect.

    Kindly resend the requested documentation. Make sure that the information on your document is clear and readable.

    Kindly respond to this same email to avoid creating multiple tickets please.

If a new selfie or document is submitted, ask the following:

Please note that for security purposes we need you to provide us with the source of your funds, which is the PDF bank statement of the account from which the deposits were made reflecting the payments made to Altcointrader as well as the below, downloaded PDF proof of payments made to us.

    Please note: The proof of payment should contain the following information:

* Date of Payment
    * Amount
    * Account number where the money was paid to
    * The reference that was used for AltCoinTrader

                                      Please bear in mind that a screenshot of the payment/bank statement is not acceptable as this does not contain all the information required.

    Kindly respond to this same email to avoid creating multiple tickets.

If there are ZAR deposits, and SOF checks out:

Please note that we require you to answer the below question in order for us to further assist you.

    How did you hear about Altcointrader?
        Were you referred by anyone to Altcointrader?
        Were you approached by anyone on social media (i.e. WhatsApp, TikTok, Facebook, Twitter, Instagram)
Do you have any other trading account that requires you to open an account with AltCoinTrader?
        Is there anyone assisting you with your account or with trading
Where will you be sending/moving your coins to once you start buying/trading on our platform or will you leave it in your Altcointrader account?

If satisfied by the client’s answers:

Kindly provide us with an affidavit stating why you falsified information/documentation on our platform and/or provided us with falsified information/documentation.

    After receiving the affidavit:

Unfortunately, to retrieve the funds deposited into your account, you will need to contact your bank. The bank must initiate a withdrawal request on their end before we can proceed further in this regard.'
            ],
            [
                'name' => 'Temporary hold as per the bank',
                'department_id' => 4,
                'body' => 'Kindly be advised that we placed a temporary hold on your withdrawals as Standard Bank contacted us with regards to the payment you made due to the large amount from your account it appears that our email did not reach you to advise you as your bank was unable to get a hold of you to confirm the transaction as legit.

For the hold to be lifted you need to confirm transactions as legit with your bank and also they need to send us an email regarding this matter, please.'
            ],
            [
                'name' => 'Third-party documentation submitted',
                'department_id' => 4,
                'body' => 'Third-party documentation submitted
Kindly be advised that a hold has been placed on your withdrawals as you have uploaded someone elses documents to your account.

    Kindly be advised that we require an affidavit where you have stated the below :

- Who the person is whose documents you uploaded?

        - What is your relationship with this person?

        - Why do you have this persons documents?

Kindly be advised that we need you to send us a picture of yourself holding your ID next to your face with the affidavit, please.

If the above is received:

Kindly be advised that we require an affidavit from that person where they have stated the below:

- Why were your details used and are you aware?

- What is your relationship with this person?
Kindly be advised that we need you to send us a picture of the person holding their ID next to their face with the affidavit, please.'
            ],
            [
                'name' => 'Third-party assistance',
                'department_id' => 4,
                'body' => 'Kindly note that AltCoinTrader does not have brokers/agents/upliners/recruiters representing us and/or trading on behalf of clients. Nor do we charge any fees besides those listed on our fees page. Trading on someones behalf, third-party deposits, and third-party withdrawals are not allowed on this platform. Altcoin Trader is a trading platform and not an investment platform.

    Please note that because you have stated that you have a recruiter you must provide us with a certified affidavit stating the following:
-The name of your recruiter
    -How/where you met this person
    -What is the relationship between the two of you?
        -Do they have access to your personal details or your account?
        -You have fully read and understood our terms and conditions as we do not have any recruiters or representatives in AltcoinTrader.
    -That any trading, deposits, or withdrawals done on your AltCoinTrader account will solely be done by you (the owner of the account) as per the terms and conditions agreed to when you opened the account.
    -State that you are fully aware that Altcoin Trader will not be held liable for any loss you encounter or if your account is compromised.

    Together with this affidavit we also require a picture of yourself holding the affidavit as well as your Id document.'
            ],
            [
                'name' => 'Dormant account',
                'department_id' => 4,
                'body' => 'Please note that the withdrawals for your account have been placed on hold as a security precaution because your account has not been accessed for an extended period.

Please provide us with the following selfie so that we may have your account unblocked as soon as possible:

Please upload a selfie of yourself holding your ID document next to your face with a piece of paper that has the following written on it: Altcoin trader, today\'s date, and unblock the account.'
            ],
            [
                'name' => 'Account De-Risked',
                'department_id' => 4,
                'body' => 'Kindly be advised that your account was flagged as compromised. Please note that we require you to send us a picture of yourself holding your ID next to your face with a handwritten piece of paper, where you have written today\'s date, AltCoin Trader, and unblock account.'
            ],
            [
                'name' => 'Zenlayer VPN/IP address block (23.251.119.153)',
                'department_id' => 4,
                'body' => 'Please note that we require you to answer the below question for us to further assist you.

How did you hear about Altcointrader?
Were you referred by anyone to Altcointrader?
Were you approached by anyone on social media (i.e. WhatsApp, tik tok, Facebook, Twitter, Instagram)
Do you have any other trading account that requires you to open an account with AltCoinTrader?
Is there anyone assisting you with your account or with trading
Where will you be sending/moving your coins to once you start buying/trading on our platform or duwill you leave it in your Altcointrader account?

Furthermore, please state where you are trying to access this account from and provide us with your IP address for us to further assist you.

If the above checks out:

Please note that for security purposes we need you to provide us with the source of your funds, which is the PDF bank statement of the account from which the deposits were made reflecting the payments made to Altcointrader as well as the below downloaded PDF proof of payments made to us.

Please note: The proof of payment should contain the following information:

* Date of Payment
* Amount
* Account number where the money was paid to
* The reference that was used for AltCoinTrader

Please bear in mind that a screenshot of the payment/bank statement is not acceptable as this does not contain all the information required.

Kindly respond to this same email to avoid creating multiple tickets.

If the source of funds check out:

Kindly be advised that your account was flagged as compromised. Please note that we require you to send us a picture of yourself holding your ID next to your face with a handwritten piece of paper, where you have written today\'s date, AltCoin Trader, and unblock account.'
            ],
            [
                'name' => 'Educate',
                'department_id' => 4,
                'body' => 'Kindly note that AltCoinTrader does not have brokers/agents representing us and/or trading on behalf of clients. Nor do we charge any fees besides those listed on our fees page. Trading on someone\'s behalf, third-party deposits, and third-party withdrawals are not allowed on this platform. Altcoin Trader is a trading platform and not an investment platform or a company that offers loans, jobs, or even requires payments for insurance or withdrawals and has no affiliation with other companies.

    Please provide any information regarding this person/account you deposited into as well as proof of payments for the deposits made into the account 021276617 so an investigation can be launched. Kindly be advised that the 9-digit reference number used to make the payment into our Altcoin Trader account held by Standard Bank is a unique reference number that differentiates each client\'s profile/account from one another. Please note that an Altcoin Trader account is similar to one\'s bank account therefore when funds are being paid into the account it is credited directly to the reference number used.

    Kindly report fraud to your bank and the police please as you have been a victim of a scam.'
            ],
            [
                'name' => 'Security Questions',
                'department_id' => 4,
                'body' => 'Please note that we require you to answer the below question in order for us to further assist you.

How did you hear about Altcointrader?
Were you referred by anyone to Altcointrader?
Were you approached by anyone on social media (i.e. WhatsApp, TikTok, Facebook, Twitter, Instagram)
Do you have any other trading account that requires you to open an account with AltCoinTrader?
Is there anyone assisting you with your account or with trading
Where will you be sending/moving your coins to once you start buying/trading on our platform or will you leave it in your Altcointrader account?'
            ],
            [
                'name' => 'Security questions plus cellphone questions',
                'department_id' => 4,
                'body' => 'Please note that we require you to answer the below question for us to further assist you.

- How did you hear about Altcointrader?
- Were you referred by anyone to Altcointrader? - Were you approached by anyone on social media (i.e. WhatsApp, TikTok, Facebook, Twitter, Instagram) with regards to trading, loan application, or job application?
- Do you have any other trading account that requires you to open an account with AltCoinTrader?
- Is there anyone assisting you with your account or with trading and providing you with trading advice?
- Where will you be sending/moving your coins to once you start buying/trading on our platform or will you leave it in your Altcointrader account?
- Whose cellphone number is registered on your profile?
- Kindly state how many cellphone numbers you have and provide them to us.'
            ],
            [
                'name' => 'Client refuses to answer the questions asked',
                'department_id' => 4,
                'body' => 'Kindly note as per section 7.2 of our terms & conditions, "...AltCoinTrader reserves the right to request independent verification of any information transmitted via e-mail and the user consents to such verification should AltCoinTrader deem it necessary."

Please note that we require you to answer all the questions asked before we are able to further assist you in this regard.'
            ],
            [
                'name' => 'Secure account',
                'department_id' => 4,
                'body' => 'Please note that you can use the following steps to secure your account and ensure that future incidents do not occur while we assess this matter:

Steps you can take to secure your account.
• Change your password on AltCoinTrader.
• Change your password for your email.
• Do not give any passwords to anybody, not even the staff of the company you are dealing with.
• Never use the same password for 2 different services.
• Enable 2 factor authentication where possible.
• Only log in from a secure device.

Please note that we need you to secure your Google authenticator codes by following the below:

- going into the Google Authenticator app

- on your right top-hand corner next to the words "Google Authenticator" you will see a cloud with a tick in it and next to it, there is a circle with either your initial or a picture of yourself.

- please click on the circle and will see a drop-down

- look for the option that says "use without an account"

- click on it, then press continue

- once this is done it will take you back to the original page showing your codes and you will see there is a line running through the cloud

These steps are to be followed accordingly in order for your codes not to be backed up on your Google account to prevent them from being compromised.'
            ],
            [
                'name' => 'Require an unblock selfie',
                'department_id' => 4,
                'body' => 'Kindly be advised that your account was flagged as compromised. Please note that we require you to send us a picture of yourself holding your ID next to your face with a handwritten piece of paper, where you have written today\'s date, AltCoin Trader, and unblock account.'
            ],
            [
                'name' => 'Hold Removed',
                'department_id' => 4,
                'body' => 'Kindly be advised that the hold has successfully been removed from your account as per your attachments. You are now able to log in and withdraw your funds.'
            ],
            [
                'name' => 'Account terminated',
                'department_id' => 4,
                'body' => 'Please note that if we determine, based on our sole discretion, that you have breached the agreement, or that of the service, or your use of the service is illegal under the laws of your jurisdiction, we reserve the right to suspend or terminate your account/s, or suspend or terminate your use of AltCoinTrader’s service/s.

Please note that we would like to inform you that we will be terminating the services of your AltCoinTrader account. We are derisking your account based on our risk management program.

We will keep your account open until <21-03-2022> to ensure that you can withdraw all of your funds to alternative accounts/addresses.'
            ],
            [
                'name' => 'No Context/Content',
                'department_id' => 4,
                'body' => 'Your email was received without any content, please elaborate on your inquiry and provide us with additional information, including screenshots, so we can further assist.'
            ],
            [
                'name' => 'Duplicate e-mail',
                'department_id' => 4,
                'body' => 'Kindly be advised that this is classified as a duplicated email as we work according to a ticket system and require all clients to respond to one email only focusing on one ticket number to avoid any confusion please as multiple duplicate emails or tickets will result in spamming your email on our platform.

This ticket will therefore be closed and we will focus on the ticket number XXX.'
            ],
            [
                'name' => 'No documents are attached to the e-mail',
                'department_id' => 4,
                'body' => 'Kindly note that there are no documents attached to the e-mail sent to us. Please resend your e-mail with the requested documentation attached.

Please respond to this same email to avoid creating multiple tickets.'
            ],
            [
                'name' => 'Provide us with proof of payments',
                'department_id' => 4,
                'body' => 'Kindly provide us with proof of payments for the last 2 transactions on your account please for us to further assist you in this regard.

Kindly provide us with a downloaded proof of payment for this transaction.
Please note: The proof of payment should contain the following information:

* Date of Payment
* Amount
* Account number where the money was paid to
* The reference that was used for AltCoinTrader

Please bear in mind that a bank statement or screenshot of the payment is not acceptable as this does not contain all the information required.

Please contact your bank should you have difficulties downloading a proof of payment as they will be able to assist you in this matter.'
            ],
            [
                'name' => 'Downloaded proof of payment',
                'department_id' => 4,
                'body' => 'Kindly send a downloaded proof of payment that shows all the deposit details so that we can be able to trace your payment and credit your account.

Please note that we won\'t be able to assist you with a screenshot or bank statement as it doesn\'t show all the details of the deposit.'
            ],
            [
                'name' => 'POA - The client resides with someone else',
                'department_id' => 4,
                'body' => 'If you do not have any documentation in your name as you live with someone else, please provide us with an affidavit, stamped by a Commissioner of Oaths, from the owner of the residence confirming that you reside with them along with the owner\'s utility bill and ID document.'
            ],
            [
                'name' => 'POA - PO BOX submitted',
                'department_id' => 4,
                'body' => 'Kindly resubmit a copy of your proof of residency making sure that all 4 corners of the page are visible and not a PO Box for us to verify your account. The address needs to match the address that is on the system.'
            ],
            [
                'name' => 'Phone call not answered',
                'department_id' => 4,
                'body' => 'Please note that we tried contacting you, but could not reach you. Kindly provide us with an appropriate time for one of our consultants to contact you telephonically.'
            ],
            [
                'name' => 'Unregistered E-mail Address',
                'department_id' => 4,
                'body' => 'For security reasons, please send this query from the email address that is registered to your AltCoinTrader account so we may be able to assist you.'
            ],
            [
                'name' => 'E-mail change',
                'department_id' => 4,
                'body' => 'Kindly be advised that as per our telephonic discussion, we are unable to do an email change on your behalf, however, we require the below for verification purposes for us to escalate this matter for you.

Please provide us with:

- A picture of your ID
- A PDF copy of your 3 months bank statement showing your account details and your address
- A picture of you holding your ID next to your face and an affidavit
- Another picture of yourself holding your ID document next to your face together with a piece of paper with the word AltCoinTrader, e-mail change, and today\'s date. Also, state the reason you changed the email address.

    Kindly be advised that we require the affidavit to state the below :

- Why are you unable to access your old email?
        - Why are unable to access your Altcoin Trader account?
        - What you would like us to do to assist you?

        Kindly be advised that we need you to send us a picture of yourself holding your ID next to your face with the affidavit, please.

    Please respond to this same email to avoid creating multiple tickets.'
            ],
            [
                'name' => 'Unauthorized e-mail change',
                'department_id' => 4,
                'body' => 'Please note that it appears your email address was compromised as well and we therefore need you to take the necessary steps to secure your email address by setting up a 2-step verification on it and a 2-factor authenticator on your Altcoin Trader account.

For us to assist you by retrieving your account please secure your email address first then further proceed by providing us with the 2 proofs of payments and a bank statement showing the transactions coming out of the bank account that were made to your Altcoin Trader account also we require a picture of yourself holding your Id document next to your face together with a piece of paper with the word AltCoinTrader, unauthorized e-mail change - retrieve account and today\'s date.

    Kindly find the below URL link for steps on how to activate the 2 FA on your Altcoin Trader account once we have managed to get you access to your account, it can also be activated on your email account.'
            ],
            [
                'name' => 'Duplicate Ticket',
                'department_id' => 4,
                'body' => 'Kindly be advised that this is classified as a duplicated email as we work according to a ticket system and require all clients to respond to one email only focusing on one ticket number to avoid any confusion, as multiple duplicated emails or tickets will result in spamming your email on our platform.

This ticket will therefore be closed and we will focus on ticket number ACT123456'
            ],
            [
                'name' => 'Unwilling to secure compromised account',
                'department_id' => 4,
                'body' => 'Please note that as you have stated you will not enable the 2Factor Authenticator on this account as advised, once we remove the hold on this account we will not be held liable in the future should the account be compromised again.

Please confirm if you still agree to us removing the hold on your account.'
            ],
            [
                'name' => 'Provide us with the ticket number',
                'department_id' => 4,
                'body' => 'Please provide us with the ticket number for the e-mail where the requested information was sent for us to further assist you.'
            ],
            [
                'name' => 'Provide us with the TXID',
                'department_id' => 4,
                'body' => 'Please kindly state which coin you have deposited and provide us with the Transaction ID for your deposit so we can assist you.'
            ],
            [
                'name' => 'Coins traded away',
                'department_id' => 4,
                'body' => 'Please note that we have successfully blocked all access to your Altcoin trader account and your account has been sent through for an audit and investigation to be performed which could take up to 5 working days.

Kindly be advised that as per our analysis, it has been noted that your email address could have been compromised and therefore we need you to take the necessary steps to secure your email address by setting up a 2-step verification on it. This may have occurred while your Gmail account was somewhat compromised as there were no unauthorized password changes detected, which means that your login details could have been compromised through saved passwords malicious websites, or pop-up ads/advertisements you may have clicked on while your Gmail account was active and in use.

Kindly advise more or less what your last trade, withdrawal, and deposit were please as well were your account balance if you do recall them for us to further assess this matter.

Please note that your funds were maliciously diminished on trades selling high and buying low.'
            ],
            [
                'name' => 'Incorrect selfie submitted',
                'department_id' => 4,
                'body' => 'Please note that the picture you’ve sent is incorrect.
Kindly resend a picture of yourself holding your original ID next to your face together with a piece of paper handwritten AltCoinTrader, 2FA Removal, and today\'s date. Make sure that the ID is clear and readable.

    Please make sure that the details ie. Your name, surname, and ID number are visible and not obstructed by your finger or the flash of the camera. Please also ensure that the details in the picture are not flipped around.

    Visit our help center to see an idea of how to take the requested picture

Kindly respond to this same email to avoid creating multiple tickets please.'
            ],
            [
                'name' => 'Multiple accounts opened',
                'department_id' => 4,
                'body' => 'Please kindly state if you have more than one account with us.

If yes, please state the e-mail address for the other account, the reasoning behind opening multiple accounts, as well as if you would like to close or keep the account.

Please also state your ID number and attach a copy of your ID document to this email.'
            ],
            [
                'name' => 'What is an IP Address?',
                'department_id' => 4,
                'body' => 'An IP address is a unique address that identifies a device on the internet or a local network. IP stands for "Internet Protocol," which is the set of rules governing the format of data sent via the Internet or local network.

In essence, IP addresses are the identifier that allows information to be sent between devices on a network: they contain location information and make devices accessible for communication. The internet needs a way to differentiate between different computers, routers, and websites. IP addresses provide a way of doing so and form an essential part of how the internet works.

The simplest way to check your router’s public IP address is to search “What is my IP address?” on Google. Google will show you the answer at the top of the page.'
            ],
            [
                'name' => 'What is my crypto address?',
                'department_id' => 4,
                'body' => 'You can find your desired crypto address by Following these easy steps
clear
Step 1. Log onto your www.altcointrader.co.za Please note that for security purposes we need you to provide us with the source of your funds, which is the bank statement of the account from which the deposits were made as well as the proof of payments made to us. account with your username or email address and your password.
Step 2. In the top menu, click on the "Deposit" menu button.

Step 3. On the deposit page, click on the "Deposit type" drop-down field and select the cryptocurrency type you would like to deposit.

Step 4. If you have not made any deposits to your selected cryptocurrency on your AltCoinTrader account you will be presented with a button "Request deposit address", this, in turn, will generate your own unique AltCoinTrader cryptocurrency deposit address.

Step 5. If you have deposited your selected cryptocurrency on your AltCoinTrader account you will be presented your own unique AltCoinTrader cryptocurrency deposit address in text format or a QR code.'
            ],
            [
                'name' => 'What is my username?',
                'department_id' => 4,
                'body' => 'Please note your username is the name that appears at the top right corner of the screen when you click User Menu. You can also check your username on your previous support/log-in emails. For example, the email would say Dear John123/Jane123 and John123/Jane123 would be your username.'
            ],
            [
                'name' => 'Fake Website',
                'department_id' => 4,
                'body' => 'Please confirm that you are logging in to the correct AltCoinTrader website and not a sponsored link.

We will not ask you to check in/ log in using your Google account

The official AltCoinTrader website URL is “altcointrader.co.za”. If a link on social media looks suspicious, do not click on it. Legit links to the AltCoinTrader app, Twitter, Instagram, YouTube, and Facebook accounts are available on the website.

Please provide us with a screenshot of the web page that you are attempting to access your account from as this may be a fake site that is used to copy your login information to gain access to your Google account.'
            ],
            [
                'name' => 'The account is password-blocked',
                'department_id' => 4,
                'body' => 'Please note that your account has been unblocked

Please note your account will automatically be unblocked 30 minutes after you have entered your password incorrectly.'
            ],
            [
                'name' => 'How to reset your password',
                'department_id' => 4,
                'body' => 'Please note that to change your password you have to click on the lost password button on the right-hand side of the screen, this will open a new page that asks for you to enter your registered email address.

Once you have entered this and clicked on the reset password button a link will be sent to the email address that you typed in. Please ensure that the email you type in is the one that you used to register your account with AltCoinTrader.

Once you have received the email click on the link provided in the email. Once you have clicked on this link it will redirect you to AltCoinTraders site and a page that says New Password and Repeat New Password. Please note that once you have entered this and clicked on the button your password will be changed.

Please note that this will be the new password that you use to log into your account.'
            ],
            [
                'name' => 'How to withdraw crypto',
                'department_id' => 4,
                'body' => 'Please note that you will get the deposit crypto address of where you want to send your funds. Then you will make sure the funds you want to send are in the same crypto currency for the crypto address you received.

You will then select the withdraw option on the website.

You will then select cryptocurrency.

You will then select the type of cryptocurrency you are sending.
You will then enter the address in the address field and fill out the amount you would like to send.

You will then select the withdrawal option.

You will then receive a confirmation email for your withdrawal.

Once confirmed your withdrawal will be processed.'
            ],
            [
                'name' => 'Withdrawal made to a fraudulent address',
                'department_id' => 4,
                'body' => 'Kindly be advised that your withdrawal has been canceled as (coin) to (address) as it has been blacklisted as a fraudulent address on our site. Please try a different address other than the one you used.'
            ]
        ];

        foreach ($cannedResponses as $response) {
            $response['suggested_status_id'] = 4;
            CannedResponse::create($response);
        }
    }
}
