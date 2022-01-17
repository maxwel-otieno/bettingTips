<?php 
    include 'db_config.php';

    $Err = "";    
    // $article_ID = $_GET['articleID'];

    // $single_article->execute([$article_ID]);
    // $row_article = $single_article->fetch(PDO::FETCH_OBJ);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        // echo "Hello";
        if(isset($_POST['articleSub'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['comment'];

            //check db if comment exists
            $query_verify = $pdo->prepare("SELECT * FROM article_response WHERE article_id=? AND email=? AND message=?");
            $query_verify->execute([$article_ID, $email, $message]);
            $row_verify = $query_verify->fetchAll(PDO::FETCH_OBJ);

            if($query_verify->rowCount() < 1){
                //Insert the comments data into the database
                $insert_article = $pdo->prepare("INSERT INTO article_response (`name`, `article_id`, `email`, `message`) VALUES('$name', '$article_ID', '$email', '$message')");
                $stmt_article = $insert_article->execute();

                if($insert_article->rowCount() > 0){
                    $Err = "<span class='alert d-flex justify-content-center mb-5' style='background-color:#2AAA00; margin-top:4rem; color: #fff'>Your comment has been sent</span>";
                }
            }else{
                $Err = "<span class='alert d-flex justify-content-center mb-5' style='background-color:red; margin-top:1rem; color: #fff'>Error!!! Comment already exists</span>";             
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <!-- Box icons -->
    <link rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

    
    <!-- bootstrap -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- google fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,300;0,500;0,900;1,600&display=swap" rel="stylesheet">
    <!-- Custom stylesheet -->
    <link rel="stylesheet" href="./css/stylesheet.css">
    <title>Bet3ways | Blog</title>

    <style>
        body{
            /* background-color: #fff; */
            background-color: white; color: black;
            /* padding-left: 15px; */
        }
        .small_container{
            width: 90%;
            margin: auto;
        }
        .frames{
            display: none;
        }
        .free_money_hr{
            width: 15%; background-color: #C13333; font-weight: bold; height: 0.2rem; margin-bottom: 4rem;
        }

        /* PROMO */
        .advert_promo{
            width: 70%;
            background-color:orange;
            border-radius:5px;
            /* margin: auto; */
            margin-top: 1rem;
            padding: 10px;
            margin-bottom: 4rem;
        }
        .advert_promo img{
            width: 30rem;
            margin-top: -10px;
        }
        #promo_code{
            background-color: orange;
            border: 4px solid grey;
            color: grey;
            font-size: 16px;
        }
        #promo_code:hover{
            background-color: #f4f4f4;
            border: none;
            color: grey;
        }
        .bonus_amt{
            padding-top: 4rem;
            color: #C13333; 
            font-size: 31px; 
            font-weight: 500;
            letter-spacing: 1.5px;
        }
        #get_bonus{
            position:relative;
            bottom: -5px;
            width: 80%;
            margin-left:10%;
            margin-bottom: 5%;
            background-color:#C13333;
            border-radius: 30px;
            font-size: 18px;
            text-decoration: none; 
            font-family: 'Times New Roman', Times, serif;
        }
        #get_bonus:hover{
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        /*tables */
        table td{
            vertical-align: center; text-align: center;
        }


        .contact{
            width: 70%;
            border: 2px solid #f4f4f4;
            padding: 15px;
            padding-right: 40px;
            margin-bottom: 4rem;
        }
        @media only screen and (max-width: 1200px){
            
            /*tables */
            .td_bonus{
                padding: 7px 17px;;
                /* font-size: 40px; */
            }
        }
        @media only screen and (max-width: 1024px){            
            /*tables */
            .td_bonus{
                padding: 7px 17px;;
                /* font-size: 40px; */
            }
        }
        @media only screen and (max-width: 978px){
            .contact{
                width: 100%;
            }
            .advert_promo{
                width: 100%;
                /* min-height: 400px; */
            }
            
            /*tables */
            .td_bonus{
                padding: 10px 30px;;
                /* font-size: 40px; */
            }
        }
        @media only screen and (max-width: 768px){
            #notShow{
                display: none;
            }
            .small_container{
                width: 95% !important;
                margin: auto;
                overflow: hidden;
            }
            .myHr{
                display: none;
            }
            h1{
                font-size: 20px;
            }
            p{
                font-size: 15px !important;
            }
            li{
                font-size: 14px !important;
            }
            .articles img{
                width: 400px !important;
                height: 250px !important;
            }
            .myImg{
                width: 15rem !important;
            }

            /*tables */
            .td_bonus{
                padding: 10px 20px;;
                /* font-size: 40px; */
            }
        }
        @media only screen and (max-width: 567px){
            .frames{
                display: block;
                position: fixed;
                left: 0;
                bottom: 0;
                width: 100%;
                text-align: center;
                z-index: 9999;
            }
            .free_money_hr{
                height: 0.2rem; 
                width: 10%;
                margin-bottom: 4rem;
                margin-top: 0px;
            }
            h1{
                font-size: 20px;
            }
            p{
                font-size: 15px !important;
            }
            li{
                font-size: 13px !important;
            }
            .articles img{
                width: 400px !important;
                height: 250px !important;
            }


            img{
                width: 40%;
            }
            .small_container{
                width: 100%;
                margin: auto;
            }
            /* .contact{
                width: 100%;
            } */

            /*Bottom Links */
            .bottomLink h1{
                font-size: 18px;
            }
            .bottomLink h2{
                font-size: 14px;
            }

            /*Advert */
            .advert_promo img{
                width: 17rem !important;
                height: 10rem !important;
                /* margin-top: 10px; */
                /* margin:0; */
            }
            /* .myImg{
                width: 3000px !important;
            } */
            .bonus_amt{
                text-align: center;
                color: #C13333; 
                font-size: 25px; 
                padding: 0;
                margin-top: -30px;
                font-weight: 500;
                letter-spacing: 0px;
            }
            #get_bonus{
                font-size: 12px;
                border-radius: 40px;
                padding: 10px 10px;
            }
            #promo_code{
                background-color: orange;
                border: 2px solid grey;
                color: grey;
                font-size: 13px;
                text-align: center;
                padding: 5px 10px;
            }

            /*tables */
            table td span{
                vertical-align: center; 
                text-align: center;
            }
            .td_bonus{
                padding: 7px 17px;;
                /* font-size: 40px; */
            }
        }
    </style>
</head>
<body>
    <!-- header -->
    <header id='home'>
        <!-- Navigation -->
        <nav class="nav">
            <div class="navigation container">
                <div class="logo">
                    <h1>Bet3ways<span style="color: brown; font-size: 25dp;">.com</span></h1>
                </div>
                <div class="menu">
                    <div class="top-nav">
                        <div class="logo">
                            <h1>Bet3ways<span style="color: brown; font-size: 25dp;">.com</span></h1>
                        </div>
                        <div class="close">
                            <i class='bx bx-x' ></i>
                        </div>
                    </div>

                    <ul class="nav-list">
                        <li class="nav-item">
                            <a href="index.php" class="nav-link scroll-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="./tips.php" class="nav-link scroll-link">Tips</a>
                        </li>
                        <li class="nav-item">
                            <a href="./livescore.php" class="nav-link scroll-link">Livescore</a>
                        </li>
                        <li class="nav-item">
                            <a href="./about.php" class="nav-link scroll-link">About</a>
                        </li>
                        <li class="nav-item">
                            <a href="./login.php" class="nav-link scroll-link">Login</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="./index.php" class="nav-link scroll-link">Create Account</a>
                        </li> -->
                        <li class="nav-item">
                            <a href="./vipsite.php" class="nav-link scroll-link" style="color: brown; padding: 0.3rem 1.8rem; background-color: gold; border: 1px solid #f4f4f4; font-weight: bold;">VVIP</a>
                        </li>
                        <!-- <li class="nav-item">
                            <a href="cart.html" class="nav-link icon"><i class="bx bx-shopping-bag"></i></a>
                        </li> -->
                    </ul>
                </div>
<!-- 
                <a href="cart.html" class="cart-icon">
                    <i class="bx bx-shopping-bag"></i>
                </a> -->

                <div class="hamburger">
                    <i class="bx bx-menu"></i>
                </div>
            </div>
        </nav>
            <?php
                if(!empty($Err)){
                    echo "<div class='container'>".$Err."</div>";
            }
            ?>

    </header>

    <div class="mt-5">

        <div class="frames">
        <iframe scrolling='no' frameBorder='0' style='padding:0px; margin:0px; border:0px;border-style:none;border-style:none;' width='320' height='80' src="https://refpasrasw.world/I?tag=d_723421m_47685c_&site=723421&ad=47685" ></iframe></div>
        <div class="small_container">
            <div class="d-flex justify-content-center mb-5">
                <h1>HOW TO EARN FROM HOME</h1><br><br>
            </div>
            <!-- <hr style="width: 30%;background-color: gold; font-weight: 800; margin: auto; margin-top: -15px; margin-bottom: 5rem; height: 0.3rem;"/> -->
            <div class="row mb-4">
                <div class="col-lg-8 col-md-12">
                    <div class="articles">  
                        What are the best ways to earn from home?
                        As you’ll learn below, there are many ways to make money from home.

                        Some that are listed below include:
                        1.Starting a blog
                        2.Selling on Amazon
                        3.Becoming an online tutor
                        4.Becoming a virtual assistant
                        5.Writing an eBook
                        6.Starting an online store
                        7.Proofreading
                        8.Bookkeeping
                        9.Flipping items for profit
                        10.Freelance writing
                        11.Teaching English from home
                        12Becoming a transcriptionist
                        Plus, much more! There are many ways to earn money from home using the internet.

                        Start a blog to make a living from home.
                        Okay, so this one isn’t an interview I did with someone else, it’s my personal story! I had to include it because it’s my favorite way to earn money from home. This is definitely one of the real ways to make money from home because I do it.
                        I created Making Sense of Cents around 7 years ago, and since then, I have earned over $4,000,000 with my blog and over $1,500,000 just in one year.
                        Blogging changed my life for the better, and it allows me to earn thousands of dollars a month, all by doing something that I love.
                        My blog was created on a whim as a way to track my own personal finance progress. And, when I started in 2011, I honestly didn’t even know that people could make money blogging!
                        I did not create Making Sense of Cents to earn money from home, but after only six months, I began to make money.

                        Blogging is quite affordable to start, and it’s easy as well.
                        Blogging has allowed me to take control of my finances and earn more money. It means I can work from home, travel whenever I want, have a flexible schedule, and more! As you can see, blogging completely changed my life for the better, and if you are interested, I urge you to learn how to start your own.
                        You can easily learn how to create a blog with my free How To Start a Blog Course.
                        Here’s a quick outline of what you will learn:
                        Day 1: Reasons you should start a blog.
                        Day 2: How to determine what to blog about.
                        Day 3: How to create your blog. In this lesson, you will learn how to start a blog on WordPress. My tutorial makes it very easy to build a blog.
                        Day 4: How to make money blogging.
                        Day 5: My tips for making passive income from blogging.
                        Day 6: How to grow your traffic and followers.
                        Day 7: Miscellaneous blogging tips that will help you be successful.
                        How To Start A Blog FREE Email Course
                        In this free course, I show you how to create a blog easily, from the technical side (it's easy - trust me!) all the way to earning your first income and attracting readers. Join now!

                        Sell on Amazon to make money online.
                        Yes, you can make money by selling on Amazon! The world’s largest online retailer has many, many people who sell items and earn money from home.
                        Jessica Larrew, of The Selling Family, explains how selling on Amazon may be a possibility for you. She is a friend of mine, and I am blown away by her success!
                        In the first year that Jessica’s family ran their Amazon FBA business together, working less than 20 hours a week total, they made over $100,000 profit!
                        Jessica also has a FREE 7 day course that will teach you everything you need to know in order to start selling on Amazon. I recommend signing up for it now!
                        This would be a great side hustle or even new job, and if you want more information, click on the interview link below.

                        In this interview, we talk about:

                        How Jessica started selling on Amazon FBA.
                        What exactly Amazon FBA is.
                        How to choose what to buy and sell.
                        How much a person can expect to earn.
                        The positives of selling on Amazon, and more.
                        Become an online tutor to learn how to earn money from home without any investment.
                        Are you looking for a flexible side hustle as an online tutor?
                        Course Hero is a website that helps high school and college students with course-specific questions.
                        Using the website, students connect with Course Hero tutors on a wide range of subjects and classes, which makes this a great side hustle for people with different educational backgrounds and experience.
                        Tutors earn an average of $3 for each question they answer on Course Hero. Earning between $12-$20 per hour, Course Hero tutors earn an average of $300/week.
                        Learn more at How To Make $300+ Weekly As An Online Tutor With Course Hero.
                        Become a virtual assistant to earn money online.
                        One of the most real ways to make money from home for free is to become a virtual assistant. This is something that so many people are doing nowadays, and I believe the need for virtual assistants will just continue to grow and grow.
                        Not only does the internet allow us to complete more daily tasks online, more and more people are working from home in fields such as blogging, social media, etc. This means virtual assistants are becoming even more in demand.
                        Online assistant tasks may include social media management, formatting and editing content, scheduling appointments or travel, email management, and more. Basically, you can get paid to do any task that needs to be done in someone’s business, but doesn’t need to be done by them.
                        Gina is a professional writer who learned how to earn money from home without any investment as a virtual assistant. In just six months, she was earning over $4,000 per month.
                        In our interview, she explains how to make this a possible career or side hustle choice for you.
                        We talk about:
                        How Gina became a virtual assistant.
                        Who the typical clients are.
                        How much you can expect to make.
                        The positives of virtual assisting, and more.
                        Learn more at Make Money Online as a Virtual Assistant.

                        

                        Write an eBook.
                        Alyssa self-published her first book and has sold more than 13,000 copies.
                        She is now earning a great passive income of over $200 a day from her book ($6,500 in one month alone!).
                        She is also the creator of From Blog To Book, a course that will help you write, launch, and market your first book. I’ve already signed up for the course, and the expertise she shares is absolutely amazing. Some of the modules in her course include:
                        Mapping Out Your Book Content
                        Strategies for Writing Your Next 30,000 Words
                        Where to Publish Your Book
                        Tutorial: Getting Your Book on Amazon
                        Design Your Book Cover
                        Set Pricing for Your Book
                        Create Your Marketing Plan

                        Start an online store.
                        Yes, you can start your own online store, and you don’t need to have tons of experience or a lot of money to do so. Many people start with no background – which means that if this is something you are interested in, then you should definitely read on.
                        I had the chance to interview Jenn Leach of E-commerce and Prosper, who explains exactly how to start an online store and make extra income.
                        Jenn is a corporate mom turned e-commerce store owner and blogger.
                        She started her online business a little over three years ago, and since then, she has developed and grown three successful online e-commerce stores earning an average of $19,000 per month.
                        She is super successful despite only spending around 5-10 hours per week on her e-commerce business.
                        Jenn Leach also has a course called E-commerce and Prosper that teaches you how to start an online store. She reveals her successful rinse and repeat formula to students in her course. It’s the same formula she uses to earn an average of $19,000 per month. In her course you will learn:

                        How to start an online store.
                        Winning e-commerce success tools.
                        How to turbocharge your e-commerce success.
                        How to start making money in THREE days.
                        Learn more about this at How Jenn Makes Over $10,000 A Month With Her Online Store In Less Than 10 Hours Per Week.
                        Grammar nut? Try proofreading for a living.
                        Have you ever read an obvious mistake and wanted to fix it?

                        Proofreaders look for punctuation mistakes, misspelled words, lack of consistency, and formatting errors.
                        You take content that other people have written and then go over it with a fine-tooth comb. You might be proofreading blog posts, print articles, academic articles, website copy, ad copy, books, student papers, emails, and more.
                        In one year, my friend Caitlin made around $43,000 by working as a freelance proofreader.
                        In her free 76-minute workshop, you will learn:
                        Common questions about becoming a proofreader
                        How to become a proofreader
                        5 signs proofreading could be a perfect fit for you
                        You can sign up for free at Transform Your Passion for Words & Reading into a Thriving Proofreading Business in as Little as 30 Days.

                        Become a bookkeeper to earn money from home.
                        Ben, founder of Bookkeeper Business Academy, explains how becoming a bookkeeper to make money online may be a possibility for you.
                        Ben helps people start and grow their own bookkeeping business with his online bookkeeping course.
                        And, guess what?
                        You don’t have to be an accountant or have any previous experience!
                        In this interview, we talk about:
                        What a bookkeeper is.
                        The typical clients a bookkeeper has.
                        How much new bookkeepers earn.
                        How to become a bookkeeper.
                        The positives and negatives of bookkeeping, and more.
                        Learn more at Make Money At Home By Becoming A Bookkeeper.

                        

                        Flip items for profit to earn money from home.
                        Have you ever found an item that you thought you could resell for a profit?
                        Melissa’s family earned $42,875 in 2015 through buy and sell flipping, and they were working only 10-20 hours per week.
                        Yes, just 10-20 hours a week!
                        And in 2016, she hit $133,000!
                        Some of the best flipped items that they’ve done include:
                        An item that they bought for $10 and flipped for $200 just 6 minutes later.
                        A security tower they bought for $6,200 and flipped for $25,000 just one month later.
                        A prosthetic leg that they bought for $30 at a flea market and sold for $1,000 on eBay the next day.
                        She also has a great book called 5 Ways to Get FREE Items To Resell for Profit, which teaches you how you can earn money from home by flipping items.
                        Sell stickers on Etsy.
                        Did you know that you can sell stickers on Etsy?
                        This can be a great side hustle!
                        In the interview below, we answer questions such as:
                        Who buys stickers on Etsy?
                        How much can you earn from selling stickers?
                        How do I find customers to sell stickers to?
                        Can someone with no tech skills create a sticker?
                        You can learn more at How To Make $1,000+ A Month Selling Stickers Online.

                        how to earn money from home without any investment
                        Start a successful freelance writing career.
                        Becoming a freelance writer is one of the best ways to make money online.

                        A freelance writer is someone who writes for a number of different clients, such as websites, blogs, magazines, and more. They don’t work for one specific company, rather they work for themselves and contract out their writing.

                        If you want to learn how to make money online for beginners, this is one that many newbies start with.
                        My friend Holly from EarnMoreWriting.com (as well as the popular personal finance blog Club Thrifty) is a very successful freelance writer and has earned over $200,000 writing online!
                        Her freelance writing course includes nine video modules, several printable worksheets, and awesome add-ons, too. Here are some of the things you can expect to learn if you take her freelance writing course:
                        Discover the #1 most important thing you can do to get paid writing jobs.
                        Learn how to find beginner jobs and move up over time.
                        Learn how price affects the amount of work you get.
                        Learn which types of jobs help me (Holly) earn the most pay, and where you can find them.
                        Find out which online platforms work best for finding paid work, and how to use them.
                        Learn how to structure your work day to earn six figures or more.
                        Learn more at How I Earn $200,000+ Writing Online Content.

                        Teach English to earn money from home.
                        Did you know that you may be able to teach English online to children to earn money online and get paid?
                        VIPKID is a company that allows you to work from home, create your own schedule, and earn $18-21 per hour (many teachers are earning over $1,000 per month) all while teaching English online.
                        They are currently in high need of teachers, too!
                        This company has been featured on Forbes, CNBC, Wall Street Journal, Woman’s Day, and more.
                        Here’s VIPKID’s teacher requirements:
                        Applicant must have an undergraduate degree in any field.
                        Any “formal” or “informal” teaching experience, such as mentoring, tutoring, coaching, or alternative education is fine.
                        You need internet and a computer.
                        Lesson plans, course materials, etc. are all provided by VIPKID.
                        You should have fun teaching engaged children.
                        You can apply to teach through VIPKID here.

                        

                        Become a transcriptionist to earn money from home.
                        Transcription work is a growing field.
                        In 2007, Janet started working from home as a medical transcriptionist. Shortly after that, she started a successful general and legal transcription business.
                        While running her business, the idea of creating a course popped up. Janet now teaches others in her online course how to transcribe online, while working from home as a transcriptionist.
                        In this interview, we talk about:
                        What a transcriptionist is.
                        How you can get started as a transcriptionist.
                        What kind of money you can expect to make.
                        The type of training you need, and more.
                        Learn more at Make Money At Home By Becoming A Transcriptionist.
                        how to make money online for beginners
                        How can I make $100 a day?
                        Learning how to make $100 a day is a great goal to have. With the career and side hustle ideas above, you will be able to earn $100 a day.

                        For the jobs above, you most likely just need an internet connection and a laptop. Some are full-time jobs, and others you may be able to complete in your spare time.

                        You could be working from home by managing social media accounts, selling photography as a photographer, helping business owners by answering phone calls, and so much more.

                        Simply go through the options above and see which ones you are most interested in learning more about.
                        I recommend reading How To Make $100 A Day.
                        How do I make an extra $1,000 a month?
                        If you want to learn how to make $1,000 a month on the side and how to earn money from home, then there are many things you could do.
                        This may include starting a blog, becoming a virtual bookkeeper, starting an online tutoring business, creating an online store, and more.
                        I recommend reading Ways To Make An Extra $1,000 A Month to learn more.
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-3 col-md-12 mt-4">
                    <h1>GET FREE BETTING MONEY</h1><hr class="free_money_hr"/>
                    <div class="table table-bordered" style="width:100%">
                        <table width="100%">
                            <tbody>
                                <!-- <tr>
                                    <td><a class="d-flex justify-content-center align-items-center" href="https://m.22bet.co.ke/?tag=d_723421m_32751c_"><img style="width: 100%; height: auto;" src="images/22Bet_1.JPG" alt="Image Here"/></a></td>
                                    <td class="d-flex justify-content-center" style="text-align: center;">
                                        <div class="inner">
                                            <a href="22bet.com">22Bet</a><br>
                                            <span class="btn bg-warning">Get Bonus</span>
                                        </div>
                                    </td>
                                </tr> -->
                                <tr>
                                    <td><a href="https://m.22bet.co.ke/?tag=d_723421m_32751c_" target="_blank" style="text-decoration: none;"><img width="100px" class="img-fluid" style="border-radius: 100%;" src="images/22Bet_1.JPG" alt="Image Here"/></a></td>
                                    <td style="padding-top: 10px;"><a href="https://m.22bet.co.ke/?tag=d_723421m_32751c_" class="text-center" style="text-decoration: none;"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 50,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                                </tr>
                                <tr>
                                    <td><a href="https://www.betway.co.ke/?btag-P77487-PR23169-CM63192-TS271152" target="_blank" style="text-decoration: none;"><img width="100px;" class="img-fluid" src="./images/betway.png" alt="Image Here"/></a></td>
                                    <td style="padding: 10px;"><a href="https://www.betway.co.ke/?btag-P77487-PR23169-CM63192-TS271152_" class="text-center" target="_blank" style="text-decoration: none;"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                                </tr>
                                <tr>
                                    <td><a href="https://melbet.ke/?tag=d_730661m_" target="_blank" style="text-decoration: none;"><img width="100px;" style="border-radius: 100%; text-decoration: none;" class="img-fluid" style="border-radius: 100%;" src="images/melbet.jfif" alt="Image Here"/></a></td>
                                    <td><a href="https://melbet.ke/?tag=d_730661m_" class="text-center" target="_blank" style="text-decoration: none;"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 2,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                                </tr>
                                <tr>
                                    <td style="padding-top: 30px;"><a href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" target="_blank" style="text-decoration: none;"><img width="100px;" style="border-radius: 100%;" class="img-fluid" src="images/1x_bet.png" alt="Image Here"/></a></td>
                                    <td style="padding-top: 10px;"><a href="https://1xbet.co.ke/?tag=d_1248161m_47149c_" class="text-center" target="_blank" style="text-decoration: none;"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                                </tr>
                                <tr>
                                    <td><a href="https://www.betwinner.com" style="text-decoration: none;"><img width="100px;" style="border-radius: 100%;" class="img-fluid" src="images/bet_winner.png" alt="Image Here"/></a></td>
                                    <td style="padding: 10px;"><a href="https://www.betwinner.com" class="text-center" style="text-decoration: none;"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 100,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                                </tr>
                                <tr>
                                    <td style="width: 50%;"><a href="https://melbet.ke/?tag=d_730661m_" style="text-decoration: none;"><img width="100px;" style="border-radius: 100%;" class="img-fluid" src="images/22Bet_1.JPG" alt="Image Here"/></a></td>
                                    <td><a href="https://melbet.ke/?tag=d_730661m_" class="text-center" style="text-decoration: none;"><span style="margin-top: 1rem; margin-bottom: -10px; color: red; font-size: 15px;">₦ 2,000<br></span><span class="btn bg-warning td_bonus">Get Bonus</span></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="advert_promo" style="padding-bottom: 20px;">
                <div class="row" style="padding:0;">
                    <!-- <div class="col-lg-2"></div> -->
                    <div class="col-lg-6 p-5">
                        <div class="d-flex justify-content-center">
                            <div>
                            <a href="https://m.22bet.co.ke/?tag=d_723421m_32751c_" style="cursor: pointer;"><img src="./images/22bet-logo.PNG" alt="" class="myImg"></a><br>
                            <!-- <a href="https://m.22bet.co.ke/?tag=d_723421m_32751c_" style="color: brown; font-weight: bold;text-align: center;margin: auto;">Full Review</a><br><hr style="margin: auto;background-color: brown; width: 10%; text-align: center;"> --></div>
                        </div>
                    </div>
                    <div class="col-lg-6 p-5">
                        <div class="d-flex justify-content-center">
                            <div>
                                <h1 class="bonus_amt">GET KSH 200 BONUS</h1>
                                <div style="text-align: center;">
                                <button class="btn" style="" id="promo_code">PROMO CODE : 22_326807</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="col-lg-2"></div> -->
                </div>
                <div>
                    <button class="btn btn-block" id="get_bonus"><a href="https://m.22bet.co.ke/?tag=d_723421m_32751c_" style="text-decoration:none; color: white;">GET YOUR BONUS</a></button>
                </div>
            </div>
            <div class="contact">
                <h3 style="color: green;">Leave a reply</h3>
                <span style="font-size: 15px;">Your email address will not be published</span><br><br>
                <form action="articles.php?articleID=<?php echo $article_ID; ?>" method="post" class="form" id="home">
                    <label for="comment" style="font-size: 17px;">Comment</label>
                    <textarea name="comment" id="commentBox" cols="20" rows="6" required class="form-control" style="font-size: 17px;"></textarea><br>
                    <label for="name" style="font-size: 17px;">Name : </label><input name="name" type="text" required class="form-control" style="font-size: 17px; height: 3.5rem;"><br>
                    <label for="email" style="font-size: 17px;">Email : </label> <input name="email" type="email" required class="form-control text-bold" style="font-size: 17px; height: 3.5rem;"><br>
                    <input type="submit" name="articleSub" value="Submit" class="btn bg-success btn-block" style="font-size: 15px;">
                </form>
            </div>
        </div><hr class="myHr" style="width: 70%; margin: auto; margin-bottom: 4rem; background-color: #fff; font-weight: bold;"/>
    </div>
        <div class="container" style="min-height: 200px;">
            <div class="row bottomLink">
                <div class="col-md-6 mb-4">
                    <h1>USEFUL LINKS</h1><hr style="width:10%; background-color: #C13333; margin-bottom: 2rem;">
                    <a href=""><h2>HOW TO WORK AND EARN ONLINE</h2></a><hr>
                    <a href=""><h2>BEST WAY OF MAKING MONEY WITH FOOTBALL BETTING</h2></a><hr>
                    <a href=""><h2>BEST FOOTBALL PREDICTION SITES?</h2></a><hr>
                    <a href=""><h2>BEST SOCCER PREDICTION SITE FOR FIXED MATCHES?</h2></a><hr>
                    <a href=""><h2>FOOTBALL BETTING GUIDE</h2></a><hr>
                </div>
                <div class="col-md-6 mb-4">
                    <h1>USEFUL ATRICLES</h1><hr style="width:10%; font-weight: bold; background-color: #C13333; margin-bottom: 2rem;;">
                    <?php
                        foreach($row_articles as $article){
                            echo "<a href='./articles.php?articleID=$article->id'><h2>$article->title</h2></a><hr>";
                        }?>
                    <a href=""><h2>BETTING SITES WITH GOOD ODDS</h2></a><hr>
                    <a href=""><h2>HOW TO STOP LOSING IN SPORT BETTING</h2></a><hr>
                    <a href="policy.php"><h2>PRIVACY POLICY</h2></a><hr>
                </div>
            </div>
        </div>

    <!-- Footer -->
    <footer id="footer" class="section footer">
        <div class="container">
            <div class="footer-container">
                <div class="footer-center">
                    <h3>EXTRAS</h3>
                    <a href="#">Brands</a>
                    <a href="#">Gift Certificates</a>
                    <a href="#">Affiliate</a>
                    <a href="#">Specials</a>
                    <a href="#">Site Map</a>
                </div>
                <div class="footer-center">
                    <h3>INFORMATION</h3>
                    <a href="#">About Us</a>
                    <a href="#">Privacy Policy</a>
                    <a href="#">Terms & Conditions</a>
                    <a href="#">Contact Us</a>
                    <a href="#">Site Map</a>
                </div>
                <div class="footer-center">
                    <h3>MY ACCOUNT</h3>
                    <a href="#">My Account</a>
                    <a href="#">Order History</a>
                    <a href="#">Wish List</a>
                    <a href="#">Newsletter</a>
                    <a href="#">Returns</a>
                </div>
                <div class="footer-center">
                    <h3>CONTACT US</h3>
                <div>
                    <span>
                    <i class="fas fa-map-marker-alt"></i>
                    </span>
                    42 Dream House, Dreammy street, 7131 Dreamville, USA
                </div>
                <div>
                    <span>
                    <i class="far fa-envelope"></i>
                    </span>
                    company@gmail.com
                </div>
                <div>
                    <span>
                    <i class="fas fa-phone"></i>
                    </span>
                    456-456-4512
                </div>
                <div>
                    <span>
                    <i class="far fa-paper-plane"></i>
                    </span>
                    Dream City, USA
                </div>
            </div>
        </div>
    </footer>
    <script>
        function myFunction(){
            console.log("Clicked");
        }
    </script>

    <!-- GSAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.6.1/gsap.min.js"></script>
    <!-- Custom Script -->
    <script src="./js/index.js"></script>
</body>
</html>