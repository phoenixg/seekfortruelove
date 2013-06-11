<?php

class Batch_Controller extends Base_Controller
{
	public $restful = true;

	public function get_sendmail()
	{
		$mailer = Laravel\IoC::resolve('mailer');

		$messageBody = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        
        <meta property="og:title" content="*|MC:SUBJECT|*" />
        
        <title>*|MC:SUBJECT|*</title>
		<style type="text/css">
			#outlook a{padding:0;} 
			body{width:100% !important;} .ReadMsgBody{width:100%;} .ExternalClass{width:100%;} 
			body{-webkit-text-size-adjust:none;} 

			body{margin:0; padding:0;}
			img{border:0; height:auto; line-height:100%; outline:none; text-decoration:none;}
			table td{border-collapse:collapse;}
			#backgroundTable{height:100% !important; margin:0; padding:0; width:100% !important;}

			body, #backgroundTable{
				background-color:#FAFAFA;
			}
			#templateContainer{
				border: 1px solid #DDDDDD;
			}

			#templateBody .bodyContent p, #templateBody .bodyContent h4, #templateBody .bodyContent li {
				color:#FF5949;
			}

			h1, .h1{
				/*@editable*/ color:#202020;
				display:block;
				/*@editable*/ font-family:Arial;
				/*@editable*/ font-size:34px;
				/*@editable*/ font-weight:bold;
				/*@editable*/ line-height:100%;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				/*@editable*/ text-align:left;
			}

			/**
			* @tab Page
			* @section heading 2
			* @tip Set the styling for all second-level headings in your emails.
			* @style heading 2
			*/
			h2, .h2{
				/*@editable*/ color:#202020;
				display:block;
				/*@editable*/ font-family:Arial;
				/*@editable*/ font-size:30px;
				/*@editable*/ font-weight:bold;
				/*@editable*/ line-height:100%;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				/*@editable*/ text-align:left;
			}

			h3, .h3{
				/*@editable*/ color:#202020;
				display:block;
				/*@editable*/ font-family:Arial;
				/*@editable*/ font-size:26px;
				/*@editable*/ font-weight:bold;
				/*@editable*/ line-height:100%;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				/*@editable*/ text-align:left;
			}

			h4, .h4{
				/*@editable*/ color:#202020;
				display:block;
				/*@editable*/ font-family:Arial;
				/*@editable*/ font-size:22px;
				/*@editable*/ font-weight:bold;
				/*@editable*/ line-height:100%;
				margin-top:0;
				margin-right:0;
				margin-bottom:10px;
				margin-left:0;
				/*@editable*/ text-align:left;
			}

			#templatePreheader{
				/*@editable*/ background-color:#FAFAFA;
			}

			.preheaderContent div{
				/*@editable*/ color:#505050;
				/*@editable*/ font-family:Arial;
				/*@editable*/ font-size:10px;
				/*@editable*/ line-height:100%;
				/*@editable*/ text-align:left;
			}

			.preheaderContent div a:link, .preheaderContent div a:visited, /* Yahoo! Mail Override */ .preheaderContent div a .yshortcuts /* Yahoo! Mail Override */{
				/*@editable*/ color:#336699;
				/*@editable*/ font-weight:normal;
				/*@editable*/ text-decoration:underline;
			}

			#templateHeader{
				/*@editable*/ background-color:#FFFFFF;
				/*@editable*/ border-bottom:0;
			}


			.headerContent{
				/*@editable*/ color:#202020;
				/*@editable*/ font-family:Arial;
				/*@editable*/ font-size:34px;
				/*@editable*/ font-weight:bold;
				/*@editable*/ line-height:100%;
				/*@editable*/ padding:0;
				/*@editable*/ text-align:center;
				/*@editable*/ vertical-align:middle;
			}

			.headerContent a:link, .headerContent a:visited, /* Yahoo! Mail Override */ .headerContent a .yshortcuts /* Yahoo! Mail Override */{
				/*@editable*/ color:#336699;
				/*@editable*/ font-weight:normal;
				/*@editable*/ text-decoration:underline;
			}

			#headerImage{
				height:auto;
				max-width:600px !important;
			}


			#templateContainer, .bodyContent{
				/*@editable*/ background-color:#FFFFFF;
			}

			.bodyContent div{
				/*@editable*/ color:#505050;
				/*@editable*/ font-family:Arial;
				/*@editable*/ font-size:14px;
				/*@editable*/ line-height:150%;
				/*@editable*/ text-align:left;
			}

			.bodyContent div a:link, .bodyContent div a:visited, /* Yahoo! Mail Override */ .bodyContent div a .yshortcuts /* Yahoo! Mail Override */{
				/*@editable*/ color:#336699;
				/*@editable*/ font-weight:normal;
				/*@editable*/ text-decoration:underline;
			}

			.bodyContent img{
				display:inline;
				height:auto;
			}

			#templateFooter{
				/*@editable*/ background-color:#FFFFFF;
				/*@editable*/ border-top:0;
			}

			.footerContent div{
				/*@editable*/ color:#707070;
				/*@editable*/ font-family:Arial;
				/*@editable*/ font-size:12px;
				/*@editable*/ line-height:125%;
				/*@editable*/ text-align:left;
			}


			.footerContent div a:link, .footerContent div a:visited, /* Yahoo! Mail Override */ .footerContent div a .yshortcuts /* Yahoo! Mail Override */{
				/*@editable*/ color:#336699;
				/*@editable*/ font-weight:normal;
				/*@editable*/ text-decoration:underline;
			}

			.footerContent img{
				display:inline;
			}


			#social{
				/*@editable*/ background-color:#FAFAFA;
				/*@editable*/ border:0;
			}


			#social div{
				/*@editable*/ text-align:center;
			}


			#utility{
				/*@editable*/ background-color:#FFFFFF;
				/*@editable*/ border:0;
			}

			#utility div{
				/*@editable*/ text-align:center;
			}

			#monkeyRewards img{
				max-width:190px;
			}
		</style>
	</head>
    <body leftmargin="0" marginwidth="0" topmargin="0" marginheight="0" offset="0">
    	<center>
        	<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" id="backgroundTable">
            	<tr>
                	<td align="center" valign="top">
                        <!-- // Begin Template Preheader \\ -->
                        <table border="0" cellpadding="10" cellspacing="0" width="600" id="templatePreheader">
                            <tr>
                                <td valign="top" class="preheaderContent">
                                
                                	<!-- // Begin Module: Standard Preheader \ -->
                                    <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                    	<tr>
                                        	<td valign="top">
                                            	<div mc:edit="std_preheader_content">
                                                定位于上海，面向所有单身青年男女，为对抗当今拜金主义价值观而产生的免费婚恋交友平台
                                                	：<a href="http://seekfortruelove.org/" target="_blank">http://seekfortruelove.org/</a>
                                                </div>
                                            </td>

                                        </tr>
                                    </table>
                                	<!-- // End Module: Standard Preheader \ -->
                                
                                </td>
                            </tr>
                        </table>
                        <!-- // End Template Preheader \\ -->
                    	<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateContainer">
                        	<tr>
                            	<td align="center" valign="top">
                            		<h1 class="h1" style="text-align:center;color:#FF5949;">SEEKFORTRUELOVE.ORG</h1>
                            		<h1 class="h1" style="text-align:center;color:#FF5949;">欢迎您！</h1>
                                    <!-- // Begin Template Header \\ -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateHeader">
                                        <tr>
                                            <td class="headerContent">
                                            
                                            	<!-- // Begin Module: Standard Header Image \\ -->
                                            	<img src="http://www.seekfortruelove.org/images/sitepromote/201306-10seekfortruelove-site-promote.png" style="max-width:600px;" id="headerImage campaign-icon" mc:label="header_image" mc:edit="header_image" mc:allowdesigner mc:allowtext />
                                            	<!-- // End Module: Standard Header Image \\ -->
                                            
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // End Template Header \\ -->
                                </td>
                            </tr>
                        	<tr>
                            	<td align="center" valign="top">
                                    <!-- // Begin Template Body \\ -->
                                	<table border="0" cellpadding="0" cellspacing="0" width="600" id="templateBody">
                                    	<tr>
                                            <td valign="top" class="bodyContent">
                                
                                                <!-- // Begin Module: Standard Content \\ -->
                                                <table border="0" cellpadding="20" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td valign="top">
                                                            <div mc:edit="std_content00">
                                                            	<h5 class="h5" style="text-align:center;">定位于上海，面向所有单身青年男女，为对抗当今拜金主义价值观而产生的免费婚恋交友平台
                                                            	</h5>

                                                                <h4 class="h4">非营利原则</h4>
                                                                <p>交友应该是完全免费的，金钱不应成为阻挡。不少营利性交友网站都有“付费看信”、“VIP会员”、“会员等级”等设计，为对抗这些网站的做法导致的机会不平等和信息不对称，本站将采用非营利原则。</p>
                                                                <p>
																尽管如此，如果愿意，未来您仍可以通过捐赠等方式支持本站。这些资助将被用于服务器维护等开销。如有必要，我将设法确保这些资助是透明、可被追溯的。
																</p>
																<p>
																免费的优势：
																</p>
																<p>
																    <ul>
																    <li>不限制提供自己的联系方式，除非联系方式疑似用作非法等非交友性质的其他目的</li>
																    <li>无需广告</li>
																    <li>更容易坚持原则</li>
																    <li>确保机会均等</li>
																    </ul>
																</p>

																<h4 class="h4">无广告原则</h4>
																<p>
																	即便是主内交友网站，也能时常看到无关、甚至色情广告出现在网站上。我无法理解一个倡导基督爱心的网站，左边还是对于虔诚、洁身自好的倡导，右边却是“伟哥”、“性病”、“帮助流产”医院的广告。难道主内的网站不得不依靠出卖对持守的信念才能维持？难道依靠广告获得盈利真的就这么重要，以至于明知这些网站与信仰违背，却故作无关紧要？
																</p>
																<p>
																	此外，无广告还有利于用户体验，将所有注意力集中在网站本身提供的功能上，而不用被广告分心。
																</p>

																<h4 class="h4">无差异原则</h4>
																<p>
																	本站被设计为无差异地对待每一位访问者，不设置特权和级别；无论是普通注册会员还是捐赠用户，所有功能与特性也是完全一致的。
																</p>

																<h4 class="h4">更强调文字</h4>
																<p>
																	仅以照片、头像作为对一个人第一印象的认知途径培养了错误的爱情观，为对抗这一交友网站的普遍做法， 我致力于将本站设计为更加强调文字，而非简单地以貌取人。
																</p>
																<p>
																	在未经对方授权情况下，您所能看到的所有照片都将以黑白素描形式显示。
																</p>

																<h4 class="h4">真实性原则</h4>
																<p>
																	本站尽最大可能验证用户信息的真实性，不真实的信息将遭到严格的审核和清除。
																</p>
                                                            </div>
														</td>
                                                    </tr>
                                                </table>
                                                <!-- // End Module: Standard Content \\ -->
                                                
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // End Template Body \\ -->
                                </td>
                            </tr>
                        	<tr>
                            	<td align="center" valign="top">
                                    <!-- // Begin Template Footer \\ -->
                                	<table border="0" cellpadding="10" cellspacing="0" width="600" id="templateFooter">
                                    	<tr>
                                        	<td valign="top" class="footerContent">
                                            
                                                <!-- // Begin Module: Standard Footer \\ -->
                                                <table border="0" cellpadding="10" cellspacing="0" width="100%">
                                                    <tr>
                                                        <td colspan="2" valign="middle" id="social">
                                                            <div mc:edit="std_social">
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td valign="top" width="350">
                                                            <div mc:edit="std_footer">
																<em>Copyright &copy; *|2013|* *|PHX|*, All rights reserved.</em>
																<br />
                                                            </div>
                                                        </td>
                                                        <td valign="top" width="190" id="monkeyRewards">
                                                            <div mc:edit="monkeyrewards">
                                                            	heresyseeker@gmail.com
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" valign="middle" id="utility">
                                                            <div mc:edit="std_utility"></div>
                                                        </td>
                                                    </tr>
                                                </table>
                                                <!-- // End Module: Standard Footer \\ -->
                                            
                                            </td>
                                        </tr>
                                    </table>
                                    <!-- // End Template Footer \\ -->
                                </td>
                            </tr>
                        </table>
                        <br />
                    </td>
                </tr>
            </table>
        </center>
    </body>
</html>';

		// 发送激活邮件
		$message = Swift_Message::newInstance('一个定位于上海的免费婚恋交友平台：Seekfortruelove.org')
				    ->setFrom(array(Config::get('application.mail_account') => 'SEEKFORTRUELOVE'))
				    ->setTo(array('2814258914@qq.com' => '对方的昵称或者邮件地址'))
				    ->setBody($messageBody,'text/html');

		$status = $mailer->send($message);
		var_dump($status);
	}


}
