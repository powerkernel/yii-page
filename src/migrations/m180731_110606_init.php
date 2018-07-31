<?php
/**
 * @author Harry Tang <harry@powerkernel.com>
 * @link https://powerkernel.com
 * @copyright Copyright (c) 2018 Power Kernel
 */

/**
 * Class m180731_110606_init
 */
class m180731_110606_init extends \yii\mongodb\Migration
{

    /**
     * @inheritdoc
     */
    public function up()
    {
        $col = Yii::$app->mongodb->getCollection('page_db');
        $col->createIndexes([
            [
                'key' => ['slug'],
                'unique' => true
            ]
        ]);
        $this->addDefaultPage();
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        /* @var $col \yii\mongodb\Collection */
        $col = Yii::$app->mongodb->getCollection('page_db');
        $col->drop();
    }

    protected function addDefaultPage(){
        /* Terms of Use */
        $page=new \powerkernel\yiipage\models\Page();
        $page->slug='terms';
        $page->title='Terms of Use';
        $page->language='en-US';
        $page->description='If you continue to use this website, you certify that you have read and agree to the following terms.';
        $page->body_md=<<<EOB
Welcome to {APP_DOMAIN}. If you continue to browse and use this website, you are agreeing to comply with and be bound by the following terms and conditions of use, which together with our privacy policy govern {APP_NAME}'s relationship with you in relation to this website. If you disagree with any part of these terms and conditions, please do not use our website.

The term '{APP_NAME}' or 'us' or 'we' refers to the owner of the website. The term 'you' refers to the user or viewer of our website.

![Terms of Use](https://c1.staticflickr.com/9/8106/29359142860_fe31dc06a1_o.png "Terms of Use")

The use of this website is subject to the following terms of use:

*   The content of the pages of this website is for your general information and use only. It is subject to change without notice.
*   This website uses cookies to monitor browsing preferences.
*   Neither we nor any third parties provide any warranty or guarantee as to the accuracy, timeliness, performance, completeness or suitability of the information and materials found or offered on this website for any particular purpose. You acknowledge that such information and materials may contain inaccuracies or errors and we expressly exclude liability for any such inaccuracies or errors to the fullest extent permitted by law.
*   Your use of any information or materials on this website is entirely at your own risk, for which we shall not be liable. It shall be your own responsibility to ensure that any products, services or information available through this website meet your specific requirements.
*   This website contains material which is owned by or licensed to us. This material includes, but is not limited to, the design, layout, look, appearance and graphics. Reproduction is prohibited other than in accordance with the copyright notice, which forms part of these terms and conditions.
*   All trade marks reproduced in this website which are not the property of, or licensed to, the operator are acknowledged on the website.
*   Unauthorised use of this website may give rise to a claim for damages and/or be a criminal offence.
*   From time to time this website may also include links to other websites. These links are provided for your convenience to provide further information. They do not signify that we endorse the website(s). We have no responsibility for the content of the linked website(s).
EOB;
        $page->keywords='terms of use, conditions';
        $page->thumbnail_square='https://c1.staticflickr.com/9/8106/29359142860_fe31dc06a1_o.png';
        $page->thumbnail_md='https://c1.staticflickr.com/9/8106/29359142860_fe31dc06a1_o.png';
        $page->thumbnail_lg='https://c1.staticflickr.com/9/8106/29359142860_fe31dc06a1_o.png';
        $page->status=\powerkernel\yiipage\models\Page::STATUS_ACTIVE;
        $page->save();

        /* privacy */
        $page=new \powerkernel\yiipage\models\Page();
        $page->slug='privacy';
        $page->title='Privacy Policy';
        $page->language='en-US';
        $page->description='This privacy policy applies solely to information collected by our website.';
        $page->body_md=<<<EOB
This privacy policy sets out how {APP_NAME} uses and protects any information that you give {APP_NAME} when you use this website.

![Privacy Policy](https://c1.staticflickr.com/9/8393/29359142920_7f14649ce8_o.png "Privacy Policy")

{APP_NAME} is committed to ensuring that your privacy is protected. Should we ask you to provide certain information by which you can be identified when using this website, then you can be assured that it will only be used in accordance with this privacy statement.  
{APP_NAME} may change this policy from time to time by updating this page. You should check this page from time to time to ensure that you are happy with any changes.  
  
**What we collect**  
We may collect the following information:

*   name and job title
*   contact information including email address
*   demographic information such as postcode, preferences and interests
*   other information relevant to customer surveys and/or offers

**What we do with the information we gather**  
We require this information to understand your needs and provide you with a better service, and in particular for the following reasons:

*   Internal record keeping.
*   We may use the information to improve our products and services.
*   We may periodically send promotional email about new products, special offers or other information which we think you may find interesting using the email address which you have provided.
*   From time to time, we may also use your information to contact you for market research purposes. We may contact you by email, phone, fax or mail.
*   We may use the information to customize the website according to your interests.
*   We may provide your information to our third party partners for marketing or promotional purposes.
*   We will never sell your information.

**Security**  
We are committed to ensuring that your information is secure. In order to prevent unauthorized access or disclosure we have put in place suitable physical, electronic and managerial procedures to safeguard and secure the information we collect online.

**How we use cookies**  
A cookie is a small file which asks permission to be placed on your computer's hard drive. Once you agree, the file is added and the cookie helps analyze web traffic or lets you know when you visit a particular site. Cookies allow web applications to respond to you as an individual. The web application can tailor its operations to your needs, likes and dislikes by gathering and remembering information about your preferences.  
  
We use traffic log cookies to identify which pages are being used. This helps us analyze data about web page traffic and improve our website in order to tailor it to customer needs. We only use this information for statistical analysis purposes and then the data is removed from the system.  
  
Overall, cookies help us provide you with a better website, by enabling us to monitor which pages you find useful and which you do not. A cookie in no way gives us access to your computer or any information about you, other than the data you choose to share with us.  
  
You can choose to accept or decline cookies. Most web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. This may prevent you from taking full advantage of the website.  
  
**Links to other websites**  
Our website may contain links to enable you to visit other websites of interest easily. However, once you have used these links to leave our site, you should note that we do not have any control over that other website. Therefore, we cannot be responsible for the protection and privacy of any information which you provide whilst visiting such sites and such sites are not governed by this privacy statement. You should exercise caution and look at the privacy statement applicable to the website in question.

**Controlling your personal information**  
You may choose to restrict the collection or use of your personal information in the following ways:

*   whenever you are asked to fill in a form on the website, look for the box that you can click to indicate that you do not want the information to be used by anybody for direct marketing purposes
*   if you have previously agreed to us using your personal information for direct marketing purposes, you may change your mind at any time by writing to or emailing us

We will not sell, distribute or lease your personal information to third parties unless we have your permission or are required by law. We may use your personal information to send you promotional information about third parties which we think you may find interesting if you tell us that you wish this to happen.  
  
If you believe that any information we are holding on you is incorrect or incomplete, please write to or email us as soon as possible. We will promptly correct any information found to be incorrect.
EOB;
        $page->keywords='privacy, policy';
        $page->thumbnail_square='https://c1.staticflickr.com/9/8393/29359142920_7f14649ce8_o.png';
        $page->thumbnail_md='https://c1.staticflickr.com/9/8393/29359142920_7f14649ce8_o.png';
        $page->thumbnail_lg='https://c1.staticflickr.com/9/8393/29359142920_7f14649ce8_o.png';
        $page->status=\powerkernel\yiipage\models\Page::STATUS_ACTIVE;
        $page->save();

    }

}
