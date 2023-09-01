<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="/css/style.css">

  <title>Document</title>
  <style>
    .user-profile {
        height: 45px;
        width: 190px;
        display: flex;
        border: 1px solid #EEEEEE;
        border-radius: 9px;
        margin-right: 18px;
        font-family: 'Nunito Sans', serif;
    }
  
    .profilepic {
        width: 28%;
        background-color: none;
        float: left;
        height: 40px;
    }
  
    .profilename {
        display: flex;
        text-align: left;
        justify-content: center;
        flex-direction: column;
        width: 55%;
        padding-left: 10px;
    }
  
    .uname {
        background-color: white;
        font-size: 15px;
        font-family: 'Nunito Sans', serif;
        font-weight: bolder;
        white-space: nowrap;
        line-height: 17px;
        text-overflow: ellipsis;
        overflow: hidden;
  
    }
  
    .profile-dropdown {
        width: 25%;
        height: 100%;
    }
  
    .pdropdown {
        position: relative;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        cursor: pointer;
    }
  
    /* profile dropdown card */
    .dropdown-profile-container {
        display: none;
        font-size: 12px;
        border-radius: 0px 0px 15px 15px;
        background-color: #fff;
        height: 290px;
        width: 210px;
        right: 0px;
        top: 40px;
        position: absolute;
        overflow: hidden;
        box-shadow: 4px 4px 10px #00000035;
    }
  
    .dropdown-profile-container .profile_info {
        height: 70%;
        width: 100%;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
  
    .profile_info .profile_photo {
        border-radius: 50%;
        width: 7rem;
        height: 7rem;
    }
  
    .profile_info .user_name {
        font-size: 17px;
        font-weight: 500;
        margin-top: 10px;
        line-height: 18px;
    }
  
    .profile_info .user_designation {
        font-size: 12px;
        line-height: 16px;
        color: #9A9AA9;
    }
  
    .dropdown-profile-container .profile_menu {
        height: 30%;
        width: 100%;
    }
  
    .profile_menu ul {
        height: 100%;
        width: 100%;
        display: flex;
        padding: 0;
        flex-direction: column;
    }
  
    .profile_menu ul li {
        width: 100%;
        display: flex;
        height: 100%;
        align-items: center;
        margin: 0;
        cursor: pointer;
        background-color: #FBFBFB;
        border-bottom: 1px solid #00000010;
    }
  
    .profile_menu ul li:hover>.icons>svg>path,
    .profile_menu ul li:hover>.name_icons {
        color: #0C97D2;
        fill: #0C97D2;
    }
  
    .profile_menu ul li .icons {
        width: 35%;
        display: flex;
        align-items: center;
        justify-content: center;
    }
  
    .profile_menu ul li .name_icons {
        width: 65%;
        font-size: 12px;
        text-align: left;
        color: #9A9AA9;
        font-weight: 700;
    }
  
    .profile_menu ul li svg {
        width: 19px;
        height: 19px;
        fill: #717579;
    }
  
    #myprofileDrop.show {
        display: block;
        z-index: 10;
    }
  
  
    .propic {
        padding-left: 0%;
    }
  
    .propic>img {
        height: 38px;
        padding-top: 5px;
        padding-left: 0px;
        width: 35px;
    }
  
    .topbar_icons {
        display: flex;
        width: 200px;
        box-sizing: border-box;
        padding: 0% 10%;
        justify-content: space-evenly;
        align-items: center;
        height: 50px;
    }
  
    .topbar_icons .subsection_icons {
        position: relative;
    }
  
    .topbar_icons .bobble.email {
        background-color: #5d5aff;
    }
  
    .topbar_icons .bobble.chat {
        background-color: #FF69B4;
    }
  
    .topbar_icons .bobble.notification {
        background-color: #ff4e4e;
    }
  
    .topbar_icons .bobble {
        position: absolute;
        top: -13px;
        right: -13px;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #fff;
        font-size: 9px;
        font-weight: 500;
        border: 3px solid #fff;
    }
  
    .subsection_icons {
        position: relative;
    }
  
    .dropdownchat-content,
    .dropdownnoti-content,
    .dropdownemail-content {
        display: none;
        background-color: #fff;
        position: absolute;
        border-radius: 10px;
        width: 300px;
        height: 250px;
        overflow: auto;
        padding: 0 2%;
        right: 0;
        text-align: left;
        box-shadow: 4px 4px 10px #00000055;
        z-index: 1;
    }
  
    .dropdownchat-content::-webkit-scrollbar,
    .dropdownnoti-content::-webkit-scrollbar,
    .dropdownemail-content::-webkit-scrollbar {
        width: 0px;
    }
  
    .dropdownchat-content a,
    .dropdownemail-content a {
        cursor: pointer;
        color: black;
        border-bottom: 1px solid #E8E9EB;
        font-size: 12px;
        height: 55px;
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: space-evenly;
        text-decoration: none;
    }
  
    .dropdownnoti-content a {
        cursor: pointer;
        color: black;
        border-bottom: 1px solid #E8E9EB;
        font-size: 12px;
        height: 55px;
        padding-left: 7%;
        padding-right: 2%;
        display: flex;
        width: 100%;
        align-items: center;
        justify-content: space-between;
        text-decoration: none;
    }
  
    .dropdownnoti-content a .middle {
        width: 95%;
    }
  
    .left {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 20%;
        height: 100%;
    }
  
    .left .chat_user_pic {
        border-radius: 50%;
        position: relative;
        width: 40px;
        height: 40px;
    }
  
    .middle {
        width: 60%;
        height: 80%;
        display: flex;
        align-items: flex-start;
        justify-content: space-evenly;
        flex-direction: column;
    }
  
    .middle .title {
        line-height: 16px;
        font-size: 14px;
        line-height: 16px;
        font-weight: 600;
        color: #5F5F5F;
    }
  
    .middle .mail_title {
        line-height: 14px;
        font-size: 11px;
        font-weight: 600;
        white-space: nowrap;
        overflow: hidden;
        color: #5F5F5F;
        text-overflow: ellipsis;
    }
  
    .middle .msg {
        line-height: 14px;
        font-weight: 500;
        width: 99%;
        white-space: nowrap;
        overflow: hidden;
        color: #868686;
        font-size: 10px;
        text-overflow: ellipsis;
    }
  
    a .right {
        height: 100%;
        width: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
    }
  
    .right .time {
        font-weight: 500;
        font-size: 9px;
        margin-bottom: 6px;
        height: 20%;
        color: #868686;
    }
  
    .right .msg_time {
        color: #8A9099;
        font-size: 8px;
    }
  
    .right .chat_total_msg {
        font-size: 10px;
        width: 20px;
        font-weight: 500;
        display: flex;
        align-items: center;
        color: #ffffff;
        justify-content: center;
        height: 20px;
        background-color: #FF6175;
        border-radius: 7px;
    }
  
    .dropdown a:hover {
        background-color: #ddd;
    }
  
    .show {
        display: block;
    }
  
    /* Search Bar at Top */
  
  
    .top-wrapper {
        margin-top: 5px;
        width: 230px;
        box-sizing: border-box;
        border: 1px #EEEEEE solid;
        background: white;
        border-radius: 14px;
    }
  
    .top-wrapper .search-input {
        padding-left: 45px;
        background: transparent;
        width: 100%;
        border-radius: 5px;
        position: relative;
        padding-right: 13px;
  
    }
  
    .search-input input {
        height: 35px;
        width: 100%;
  
        outline: none;
        border: none;
        border-radius: 5px;
        font-size: 13px;
  
    }
  
    .search-input.tsactive input {
        border-radius: 5px 5px 0 0;
    }
  
    .search-input .autocom-box {
        padding: 0;
        opacity: 0;
        pointer-events: none;
        max-height: 280px;
        overflow-y: auto;
    }
  
    .autocom-box::-webkit-scrollbar {
        width: 0px;
    }
  
    .search-input.tsactive .autocom-box {
        padding: 10px 8px;
        opacity: 1;
        pointer-events: auto;
    }
  
    .autocom-box li {
        list-style: none;
        padding: 8px 12px;
        display: none;
        width: 100%;
        cursor: default;
        font-size: 12px;
        text-align: left;
        border-radius: 3px;
    }
  
    .search-input.tsactive .autocom-box li {
        display: block;
    }
  
    .search-input .autocom-box li {
        display: none;
    }
  
    .autocom-box li:hover {
        background: #efefef;
    }
  
    .search-input .icon {
        position: absolute;
        left: 2px;
        top: 0px;
        height: 25px;
        width: 40px;
        text-align: center;
        line-height: 40px;
        font-size: 20px;
  
        cursor: pointer;
    }
  
    .icon>svg {
        height: 17px;
    }
  </style>
</head>
<body>

    <div class="topHeader">
        <div class="topnav fixed-nav-bar">
            <div class="navleft">
                <div class="main-logo">
                    <div class="logo-img"><img src="" alt=""></div>
                </div>
                <div class="toggle-btn" onclick="toggleDiv()">
                    <div class="closeSideBar">
                        <img src="" alt="">
                    </div>
                </div>
            </div>
            <ul>
                <li>
                    <div class="user-profile">
                        <div class="profilepic">
                            <div class="propic"> <img src="" alt=""></div>
                        </div>
                        <div class="profilename">

                            <div class="uname"><span> </span>
                            </div>
                            <div class="role-name">Student</div>
                        </div>
                        <div class="profile-dropdown">
                            <div class="pdropdown">
                                <div onclick="myprofile_drop()" class="profile_btn4"><svg width="8" height="8"
                                        viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0 3.26056L6.50002 9.73941L13 3.26056H0Z" fill="#717579" />
                                    </svg>
                                </div>
                                <div id="myprofileDrop" class="dropdown-profile-container">
                                    <div class="profile_info">
                                        <div class="profile_photo"
                                            style="  background:url() no-repeat;
                  background-position: center;
                  background-size: cover;">
                                        </div>
                                        <div class="user_name"></div>
                                        <div class="user_designation">Student</div>
                                    </div>
                                    <div class="profile_menu">
                                        <ul>
                                            <li>
                                                <div class="icons">
                                                    <svg width="36px" height="36px" viewBox="0 0 36 36"
                                                        version="1.1" preserveAspectRatio="xMidYMid meet"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        xmlns:xlink="http://www.w3.org/1999/xlink">
                                                        <title>edit-solid</title>
                                                        <path class="clr-i-solid clr-i-solid-path-1"
                                                            d="M4.22,23.2l-1.9,8.2a2.06,2.06,0,0,0,2,2.5,2.14,2.14,0,0,0,.43,0L13,32,28.84,16.22,20,7.4Z">
                                                        </path>
                                                        <path class="clr-i-solid clr-i-solid-path-2"
                                                            d="M33.82,8.32l-5.9-5.9a2.07,2.07,0,0,0-2.92,0L21.72,5.7l8.83,8.83,3.28-3.28A2.07,2.07,0,0,0,33.82,8.32Z">
                                                        </path>
                                                        <rect x="0" y="0" width="36"
                                                            height="36" fill-opacity="0" />
                                                    </svg>
                                                </div>
                                                <p class="name_icons">Edit Profile</p>
                                            </li>

                                            <li>
                                                <div class="icons"><svg width="28" height="26"
                                                        viewBox="0 0 28 26" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                                            d="M10.8985 11.8452C10.337 11.8452 9.89307 12.2815 9.89307 12.8333C9.89307 13.3723 10.337 13.8215 10.8985 13.8215H18.7328V19.9558C18.7328 23.1 16.1344 25.6667 12.9223 25.6667H6.56349C3.36449 25.6667 0.766113 23.1128 0.766113 19.9687V5.71083C0.766113 2.55383 3.37755 0 6.57655 0H12.9484C16.1344 0 18.7328 2.55383 18.7328 5.698V11.8452H10.8985ZM23.3916 8.39326L27.1389 12.1278C27.3314 12.3203 27.4341 12.5641 27.4341 12.8336C27.4341 13.0903 27.3314 13.3469 27.1389 13.5266L23.3916 17.2611C23.1991 17.4536 22.9424 17.5562 22.6986 17.5562C22.4419 17.5562 22.1852 17.4536 21.9927 17.2611C21.6077 16.8761 21.6077 16.2472 21.9927 15.8623L24.0461 13.8218H18.7331V11.8454H24.0461L21.9927 9.80492C21.6077 9.41992 21.6077 8.79109 21.9927 8.40609C22.3777 8.00826 23.0066 8.00826 23.3916 8.39326Z"
                                                            fill="#717579" />
                                                    </svg>
                                                </div>
                                                <a class="name_icons" href="{% url 'doLogout' %}">Sign Out</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </li>
                <li>
                    <div class="topbar_icons">
                        <div class="subsection_icons" onclick="dropdownemail()">
                            <svg width="22" height="22" viewBox="0 0 31 31" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M16.3333 16.6364C16.0852 16.8183 15.7926 16.9091 15.5 16.9091C15.2073 16.9091 14.9148 16.8183 14.6667 16.6364L2.81817 7.94752L9.39391e-05 5.88095L0 25.8334C9.39391e-05 26.6116 0.630895 27.2425 1.40909 27.2425L29.5909 27.2424C30.3692 27.2424 31 26.6115 31 25.8334V5.88086L28.1817 7.94752L16.3333 16.6364Z"
                                    fill="#717579" />
                                <path d="M15.5002 13.7527L29.1295 3.75766L1.87061 3.75757L15.5002 13.7527Z"
                                    fill="#717579" />
                            </svg>
                            <div class="bobble email">
                                <p>4</p>
                            </div>
                            <div id="email_dropdown" class="dropdownemail-content">
                                <a>
                                    <div class="left">
                                        <div style="
                  background: url(../assets/Chat/user_photo.png);
                  background-repeat:no-repeat;
                  background-size: cover;
                  background-position: center;
                "
                                            class="chat_user_pic"></div>
                                    </div>
                                    <div class="middle">
                                        <div class="title">Main title</div>
                                        <div class="mail_title">Main title</div>
                                        <div class="msg">Description This is the sport Tournament </div>
                                    </div>
                                    <div class="right">
                                        <div class="time">2 Sept</div>
                                        <div class="msg_time">10:04 am</div>
                                    </div>
                                </a>
                                <a>
                                    <div class="left">
                                        <div style="
                  background: url({%static 'assets/Chat/user_photo.png'%});
                  background-repeat:no-repeat;
                  background-size: cover;
                  background-position: center;
                "
                                            class="chat_user_pic"></div>
                                    </div>
                                    <div class="middle">
                                        <div class="title">Main title</div>
                                        <div class="mail_title">Main title</div>
                                        <div class="msg">Description This is the sport Tournament </div>
                                    </div>
                                    <div class="right">
                                        <div class="time">2 Sept</div>
                                        <div class="msg_time">10:04 am</div>
                                    </div>
                                </a>
                                <a>
                                    <div class="left">
                                        <div style="
                  background: url({%static 'assets/Chat/user_photo.png'%});
                  background-repeat:no-repeat;
                  background-size: cover;
                  background-position: center;
                "
                                            class="chat_user_pic"></div>
                                    </div>
                                    <div class="middle">
                                        <div class="title">Main title</div>
                                        <div class="mail_title">Main title</div>
                                        <div class="msg">Description This is the sport Tournament </div>
                                    </div>
                                    <div class="right">
                                        <div class="time">2 Sept</div>
                                        <div class="msg_time">10:04 am</div>
                                    </div>
                                </a>
                                <a>
                                    <div class="left">
                                        <div style="
                  background: url({%static 'assets/Chat/user_photo.png'%});
                  background-repeat:no-repeat;
                  background-size: cover;
                  background-position: center;
                "
                                            class="chat_user_pic"></div>
                                    </div>
                                    <div class="middle">
                                        <div class="title">Main title</div>
                                        <div class="mail_title">Main title</div>
                                        <div class="msg">Description This is the sport Tournament </div>
                                    </div>
                                    <div class="right">
                                        <div class="time">2 Sept</div>
                                        <div class="msg_time">10:04 am</div>
                                    </div>
                                </a>
                                <a>
                                    <div class="left">
                                        <div style="
                  background: url({%static 'assets/Chat/user_photo.png'%});
                  background-repeat:no-repeat;
                  background-size: cover;
                  background-position: center;
                "
                                            class="chat_user_pic"></div>
                                    </div>
                                    <div class="middle">
                                        <div class="title">Main title</div>
                                        <div class="mail_title">Main title</div>
                                        <div class="msg">Description This is the sport Tournament</div>
                                    </div>
                                    <div class="right">
                                        <div class="time">2 Sept</div>
                                        <div class="msg_time">10:04 am</div>
                                    </div>
                                </a>
                                <a>
                                    <div class="left">
                                        <div style="
                  background: url({%static 'assets/Chat/user_photo.png'%});
                  background-repeat:no-repeat;
                  background-size: cover;
                  background-position: center;
                "
                                            class="chat_user_pic"></div>
                                    </div>
                                    <div class="middle">
                                        <div class="title">Main title</div>
                                        <div class="mail_title">Main title</div>
                                        <div class="msg">Description This is the sport Tournament</div>
                                    </div>
                                    <div class="right">
                                        <div class="time">2 Sept</div>
                                        <div class="msg_time">10:04 am</div>
                                    </div>
                                </a>
                                <a>
                                    <div class="left">
                                        <div style="
                  background: url({%static 'assets/Chat/user_photo.png'%});
                  background-repeat:no-repeat;
                  background-size: cover;
                  background-position: center;
                "
                                            class="chat_user_pic"></div>
                                    </div>
                                    <div class="middle">
                                        <div class="title">Main title</div>
                                        <div class="mail_title">Main title</div>
                                        <div class="msg">Description This is the sport Tournament </div>
                                    </div>
                                    <div class="right">
                                        <div class="time">2 Sept</div>
                                        <div class="msg_time">10:04 am</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="subsection_icons" onclick="dropdownchat()">
                            <svg width="22" height="22" viewBox="0 0 31 31" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M23.9545 0H7.04545C5.17757 0.00223742 3.38683 0.745238 2.06604 2.06602C0.745243 3.38681 0.00223744 5.17754 0 7.04541V18.3181C0.00204956 19.9416 0.563763 21.5148 1.59047 22.7725C2.61717 24.0302 4.04608 24.8955 5.63636 25.2226V29.5907C5.63633 29.8458 5.70554 30.0961 5.83663 30.315C5.96772 30.5338 6.15576 30.713 6.38069 30.8333C6.60563 30.9537 6.85901 31.0107 7.11382 30.9983C7.36862 30.986 7.61529 30.9046 7.8275 30.7631L15.9227 25.3635H23.9545C25.8224 25.3612 27.6132 24.6182 28.934 23.2974C30.2548 21.9767 30.9978 20.1859 31 18.3181V7.04541C30.9978 5.17754 30.2548 3.38681 28.934 2.06602C27.6132 0.745238 25.8224 0.00223742 23.9545 0ZM21.1364 16.909H9.86364C9.48992 16.909 9.13151 16.7605 8.86726 16.4963C8.603 16.232 8.45455 15.8736 8.45455 15.4999C8.45455 15.1262 8.603 14.7678 8.86726 14.5035C9.13151 14.2393 9.48992 14.0908 9.86364 14.0908H21.1364C21.5101 14.0908 21.8685 14.2393 22.1327 14.5035C22.397 14.7678 22.5455 15.1262 22.5455 15.4999C22.5455 15.8736 22.397 16.232 22.1327 16.4963C21.8685 16.7605 21.5101 16.909 21.1364 16.909ZM23.9545 11.2727H7.04545C6.67174 11.2727 6.31333 11.1242 6.04908 10.8599C5.78482 10.5957 5.63636 10.2373 5.63636 9.86357C5.63636 9.48986 5.78482 9.13145 6.04908 8.8672C6.31333 8.60294 6.67174 8.45449 7.04545 8.45449H23.9545C24.3283 8.45449 24.6867 8.60294 24.9509 8.8672C25.2152 9.13145 25.3636 9.48986 25.3636 9.86357C25.3636 10.2373 25.2152 10.5957 24.9509 10.8599C24.6867 11.1242 24.3283 11.2727 23.9545 11.2727Z"
                                    fill="#717579" />
                            </svg>
                            <div class="bobble chat">
                                <p>23</p>
                            </div>
                            <div id="chat_dropdown" class="dropdownchat-content">
                                <a>
                                    <div class="left">
                                        <div style="
                  background: url({%static 'assets/Chat/user_photo.png'%});
                  background-repeat:no-repeat;
                  background-size: cover;
                  background-position: center;
                "
                                            class="chat_user_pic"></div>
                                    </div>
                                    <div class="middle">
                                        <div class="title">Main title</div>
                                        <div class="msg">Description This is the sport Tournament </div>
                                    </div>
                                    <div class="right">
                                        <div class="time">2 Sept</div>
                                        <div class="chat_total_msg">4</div>
                                    </div>
                                </a>
                                <a>
                                    <div class="left">
                                        <div style="
                  background: url({%static 'assets/Chat/user_photo.png'%});
                  background-repeat:no-repeat;
                  background-size: cover;
                  background-position: center;
                "
                                            class="chat_user_pic"></div>
                                    </div>
                                    <div class="middle">
                                        <div class="title">Main title</div>
                                        <div class="msg">Description This is the sport Tournament</div>
                                    </div>
                                    <div class="right">
                                        <div class="time">2 Sept</div>
                                        <div class="chat_total_msg">4</div>
                                    </div>
                                </a>
                                <a>
                                    <div class="left">
                                        <div style="
                  background: url({%static 'assets/Chat/user_photo.png'%});
                  background-repeat:no-repeat;
                  background-size: cover;
                  background-position: center;
                "
                                            class="chat_user_pic"></div>
                                    </div>
                                    <div class="middle">
                                        <div class="title">Main title</div>
                                        <div class="msg">Description This is the sport Tournament</div>
                                    </div>
                                    <div class="right">
                                        <div class="time">2 Sept</div>
                                        <div class="chat_total_msg">4</div>
                                    </div>
                                </a>
                                <a>
                                    <div class="left">
                                        <div style="
                  background: url({%static 'assets/Chat/user_photo.png'%});
                  background-repeat:no-repeat;
                  background-size: cover;
                  background-position: center;
                "
                                            class="chat_user_pic"></div>
                                    </div>
                                    <div class="middle">
                                        <div class="title">Main title</div>
                                        <div class="msg">Description This is the sport Tournament</div>
                                    </div>
                                    <div class="right">
                                        <div class="time">2 Sept</div>
                                        <div class="chat_total_msg">4</div>
                                    </div>
                                </a>
                                <a>
                                    <div class="left">
                                        <div style="
                  background: url({%static 'assets/Chat/user_photo.png'%});
                  background-repeat:no-repeat;
                  background-size: cover;
                  background-position: center;
                "
                                            class="chat_user_pic"></div>
                                    </div>
                                    <div class="middle">
                                        <div class="title">Main title</div>
                                        <div class="msg">Description This is the sport Tournament</div>
                                    </div>
                                    <div class="right">
                                        <div class="time">2 Sept</div>
                                        <div class="chat_total_msg">4</div>
                                    </div>
                                </a>
                                <a>
                                    <div class="left">
                                        <div style="
                  background: url({%static 'assets/Chat/user_photo.png'%});
                  background-repeat:no-repeat;
                  background-size: cover;
                  background-position: center;
                "
                                            class="chat_user_pic"></div>
                                    </div>
                                    <div class="middle">
                                        <div class="title">Main title</div>
                                        <div class="msg">Description This is the sport Tournament </div>
                                    </div>
                                    <div class="right">
                                        <div class="time">2 Sept</div>
                                        <div class="chat_total_msg">4</div>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <div class="subsection_icons" onclick="dropdownnoti()">
                            <svg width="22" height="22" viewBox="0 0 32 32" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M30.7531 22.1038L27.9132 17.9114V12.2708C27.9132 9.03386 26.6067 5.9295 24.2811 3.64064C21.9554 1.35179 18.8012 0.065918 15.5122 0.065918C12.2232 0.065918 9.069 1.35179 6.74336 3.64064C4.41771 5.9295 3.11118 9.03386 3.11118 12.2708V17.9114L0.271343 22.1038C0.11621 22.3337 0.0272619 22.6006 0.0139556 22.8762C0.000649285 23.1519 0.0634818 23.4259 0.195774 23.6692C0.328065 23.9125 0.524872 24.1159 0.76527 24.2579C1.00567 24.4 1.28067 24.4752 1.56105 24.4757H29.4634C29.7437 24.4752 30.0187 24.4 30.2591 24.2579C30.4995 24.1159 30.6963 23.9125 30.8286 23.6692C30.9609 23.4259 31.0238 23.1519 31.0105 22.8762C30.9972 22.6006 30.9082 22.3337 30.7531 22.1038V22.1038Z"
                                    fill="#717579" />
                                <path
                                    d="M15.8335 31.0658C17.2079 31.067 18.5436 30.6178 19.6298 29.7891C20.7161 28.9604 21.491 27.7993 21.8325 26.489H9.83447C10.1759 27.7993 10.9509 28.9604 12.0371 29.7891C13.1234 30.6178 14.4591 31.067 15.8335 31.0658V31.0658Z"
                                    fill="#717579" />
                            </svg>
                            <div class="bobble notification">
                                99+
                            </div>
                            <div id="noti_dropdown" class="dropdownnoti-content">
                                <a>
                                    <div class="middle">
                                        <div class="title">Main title</div>
                                        <div class="msg"> k . message  </div>
                                    </div>
                                    <div class="right">
                                        <div class="time">2 Sept</div>
                                    </div>
                                </a>

                            </div>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="top-wrapper">
                        <div class="search-input">
                            <a href="" target="_blank" hidden></a>
                            <div class="icon"><svg width="27" height="26" viewBox="0 0 27 26"
                                    fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <circle cx="9.95683" cy="9.95683" r="8.95683" fill="white"
                                        stroke="#717579" stroke-width="2" />
                                    <path d="M17.2317 16.5947L25.3069 24.0623" stroke="#717579" stroke-width="2.5"
                                        stroke-linecap="round" />
                                </svg>
                            </div>
                            <input type="text" placeholder="Search Here..">
                            <div class="autocom-box">
                                <div class="icon"><svg width="27" height="26" viewBox="0 0 27 26"
                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="9.95683" cy="9.95683" r="8.95683" fill="white"
                                            stroke="#717579" stroke-width="2" />
                                        <path d="M17.2317 16.5947L25.3069 24.0623" stroke="#717579"
                                            stroke-width="2.5" stroke-linecap="round" />
                                    </svg>
                                </div>
                                <!-- here list are inserted from javascript -->
                            </div>

                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <script>
        // getting all required elements
        const searchWrapper = document.querySelector(".search-input");
        const inputBox = searchWrapper.querySelector("input");
        const suggBox = searchWrapper.querySelector(".autocom-box");
        const icon = searchWrapper.querySelector(".icon");
        let linkTag = searchWrapper.querySelector("a");
        let webLink;

        // if user press any key and release
        inputBox.onkeyup = (e) => {
            let userData = e.target.value; //user enetered data
            let emptyArray = [];
            if (userData) {
                icon.addEventListener("click", function() {
                    webLink = `https://www.google.com/search?q=${selectData}`;
                    linkTag.setAttribute("href", webLink);
                    linkTag.click();
                })
                inputBox.addEventListener("keypress", function(e) {
                    if (e.keyCode === 13) {
                        webLink = `https://www.google.com/search?q=${selectData}`;
                        linkTag.setAttribute("href", webLink);
                        linkTag.click();
                    }
                })
                emptyArray = suggestions.filter((data) => {
                    //filtering array value and user characters to lowercase and return only those words which are start with user enetered chars
                    return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
                });
                emptyArray = emptyArray.map((data) => {
                    // passing return data inside li tag
                    return data = `<li>${data}</li>`;
                });
                searchWrapper.classList.add("tsactive"); //show autocomplete box
                showSuggestions(emptyArray);
                let allList = suggBox.querySelectorAll("li");
                for (let i = 0; i < allList.length; i++) {
                    //adding onclick attribute in all li tag
                    allList[i].setAttribute("onclick", "select(this)");
                }
            } else {
                searchWrapper.classList.remove("tsactive"); //hide autocomplete box
            }
        }

        function select(element) {
            let selectData = element.textContent;
            inputBox.value = selectData;
            icon.addEventListener("click", function() {
                webLink = `https://www.google.com/search?q=${selectData}`;
                linkTag.setAttribute("href", webLink);
                linkTag.click();
            })
            inputBox.addEventListener("keypress", function(e) {
                alert("asdfa  ")
                if (e.key === 'Enter') {
                    webLink = `https://www.google.com/search?q=${selectData}`;
                    linkTag.setAttribute("href", webLink);
                    linkTag.click();
                }
            })
            searchWrapper.classList.remove("tsactive");
        }

        function showSuggestions(list) {
            let listData;
            if (!list.length) {
                userValue = inputBox.value;
                listData = `<li>${userValue}</li>`;
            } else {
                listData = list.join('');
            }
            suggBox.innerHTML = listData;
        }
    </script>
</body>
</html>