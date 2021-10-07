@extends('master')
@section('inline-css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css" />
    <link rel="stylesheet" href="{{ asset('assets/css/account.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/message.css') }}">
    <style>
        * {
            box-sizing: border-box;
        }
        
                        .blackletter {
                            color: black;
                        }
                        .greyletter {
                            color: grey;
                        }
                        .redletter {
                            color: red;
                        }
                        .letter20 {
                            font-size: 20px;
                        }
                        .letter18 {
                            font-size: 18px;
                        }
                        .letter16 {
                            font-size: 16px;
                        }
                        .letter14 {
                            font-size: 14px;
                        }
                        .letter12 {
                            font-size: 12px;
                        }
        .clearfix::after {
          content: "";
          clear: both;
          display: table;
        }
        .maincontent {
            margin: 10px 5%;
            height: 800px;
            background-color: grey;
            display: flex;
        }
            .allchat {
                width: 25%;
                background-color: white;
                display: flex;
                flex-direction: column;
                font-size: 20px;
            }
                .allchatheader {
                    height: 80px;
                    border: 2px solid grey;
                    display: flex;
                    align-items: center;
                    justify-content: space-around;
                }
                .allchatbody {
                    height: calc(100% - 80px);
                    border: 2px solid grey;
                    overflow: scroll;
                }
                    .allchatbody ul {
                        list-style-type: none;
                        padding: 0;
                    }
                    .allchatbody ul li {
                        border: 1px solid grey;
                        width: 100%;
                        height: 70px;
                        
                    }
                        .allchatbody ul li:hover {
                            cursor: pointer;
                            background: grey;
                        }
                        .allchatimg {
                            width: 50px;
                            height: 50px;
                            border-radius: 50px;
                            margin: 10px 20px 0px 10px;
                            float: left;
                        }
                        .smallchatclientname {
                            margin: 5px 10px;
                        }
            .chatcollection {
                width: 75%;
                background-color: #4F5C36;
                display: flex;
                flex-direction: column;
            }
                .chatheader {
                    height: 80px;
                    background-color: white;
                    font-size: 20px;
                    border: 2px solid grey;
                    
                }
                    .activationpoint {
                        float: left;
                        margin: 15px 15px 0px 30px;
                    }
                    .chatclientname {
                        margin-top: 5px;
                    }
                    .lastseen {
                        float: left;
                        margin: 0px 30px 0px 15px;
                        
                    }
                    .small_p {
                        font-size: 14px;
                    }
                .chatbody {
                    
                    height: calc( 100% - 80px);
                    background-color: white;
                    
                    display: flex;
                    
                }
                    .mainchat {
                        width: 70%;
                        background-color: #E7E7E7;
                    }
                        .messagelist {
                            height: calc(100% - 120px);
                            margin: 0px 0px 10px;
                            overflow: scroll;
                            background-color: white;
                        }
                            .messagelist ul {
                                list-style-type: none;
                                margin: 0px;
                                padding: 0px;
                            }
                            .messagelist ul li{
                                width: 80%;
                                display: flex;
                                margin-bottom: 5px;
                            }
                            .in {
                                float:left;
                                flex-direction:row;
                            }
                            .out {
                                float:right;
                                flex-direction:row-reverse;
                            }
                        .editmessage {
                            height: 50px;
                            width:100%;
                            border: 2px solid black;
                            border-radius: 10px;
                            background-color: white;
                            padding: 0px 10px;
                        }
                        .editmessage:active {
                            border: 2px solid black;
                            border-radius: 10px;
                        }
                        .editsetting {
                            height: 60px;
                            display: flex;
                            align-items: center;
                            justify-content: space-around;
                        }
                            .editsetfirst {
                                width: 30px;
                                height: 30px;
                                margin-left: 20px;
                            }
                                .editsetfirst:hover {
                                    cursor:pointer;
                                }
                            .createoffer {
                                padding: 5px;
                                border: 5px solid red;
                                background-color: #C09590;
                                margin:0px 5px;
                            }
                                .createoffer:hover {
                                    cursor:pointer;
                                }
                            .sendmessage:hover {
                                cursor:pointer;
                            }
                    .aboutme {
                        width: 30%;
                        background-color: white;
                        display: flex;
                        flex-direction: column;
                        align-items: center;
                        border: 2px solid grey;
                        
                    }
                        .aboutimg {
                            width: 100px;
                            height: 100px;
                            border-radius: 100px;
                        }
                        .aboutme p {
                            margin-top: 10px;
                        }
                        .aboutstarimg {
                            width: 20px;
                            height: 20px;
                            display: inline;
                        }
        
        @media (max-width:991px){
            .maincontent {
                height: 1200px;
            }    
                .chatbody {
                    height: calc( 100% - 80px);
                    background-color: white;
                    
                    display: flex;
                    flex-direction: column;
                    
                }
                    .mainchat {
                        width: 100%;
                        background-color: #E7E7E7;
                        height: 60%;
                    }
                        
                            .messagelist ul li{
                                width: 95%;
                            }
                    .aboutme {
                        width: 100%;
                        background-color: white;
                        height: 40%;
                    }
        }
        
        @media (max-width:769px){
            .maincontent {
                margin: 10px 5%;
                height: 1600px;
                display: flex;
                flex-direction: column;
            }
                .allchat {
                    width: 100%;
                    height: 30%;
                    background-color: white;
                }
                .chatcollection {
                    width: 100%;
                    height: 100%;
                    background-color: #4F5C36;
                    display: flex;
                    flex-direction: column;
                }
                    .chatheader, .mainchat {
                        border: 1px solid grey;
                    }
        }
        
        @media (max-width:500px) {
            .maincontent {
                margin: 10px 0px;
                height: 1600px;
                display: flex;
                flex-direction: column;
            }
                .allchat {
                    width: 100%;
                    height:30%;
                    background-color: white;
                }
                .chatcollection {
                    width: 100%;
                    height: 100%;
                    background-color: #4F5C36;
                    display: flex;
                    flex-direction: column;
                }
        }
    </style>
@endsection
@section('content')
    <div class="maincontent">
        <div class="allchat">
            <div class="allchatheader">
                <p>All conversation</p>
                <img src="{{asset('assets/img/search1.png')}}">
            </div>
            <div class="allchatbody">
                <ul id="allchatbodyul">
                    
                </ul>
            </div>
        </div>
        <div class="chatcollection">
            <div class="chatheader">
                <img class="activationpoint" src="{{asset('assets/img/active2.png')}}">
                <p class="chatclientname">Chat Client Name</p>
                <p class="lastseen small_p">Last seen:3d ago</p>
                <p class="localtime small_p">Local time 9:38 am</p>
                <input type="hidden" id="firstid" name="firstid" value="{{Auth::user()->id}}">
                <input type="hidden" id="secondid" name="secondid">
            </div>
            <div class="chatbody">
                <div class="mainchat">
                    <div class="messagelist">
                        <ul id="messagelistul">
                            <h1>Select recent chat client!</h1>
                        </ul>
                    </div>
                        <input class="editmessage" type="text" placeholder="Edit message... " />
                    
                    <div class="editsetting">
                        <img class="editsetfirst" src="{{asset('assets/img/editsetf.png')}}">
                        <img class="editsetfirst" src="{{asset('assets/img/emojis.png')}}">
                        <p class="createoffer letter14 redletter">Offer</p>
                        <img class="editsetfirst" src="{{asset('assets/img/arrow.png')}}">
                        <a class="letter20 blackletter sendmessage">Send</a>
                    </div>
                </div>
                <div class="aboutme">
                    <p class="letter20">About</p>
                    <img class="aboutimg" src="{{asset('assets/img/profile_pic/user1.jpg')}}">
                    <p class="letter16">UserName</p>
                    <p class="letter14">From: Russia</p>
                    <p class="letter14">English: Basic</p>
                    <p class="letter14">Skills: Video Animation Marketing</p>
                    <p class="letter16">Review Summary</p>
                    <div>
                        <img class="aboutstarimg" src="{{asset('assets/img/star.png')}}">
                        <img class="aboutstarimg" src="{{asset('assets/img/star.png')}}">
                        <img class="aboutstarimg" src="{{asset('assets/img/star.png')}}">
                        <img class="aboutstarimg" src="{{asset('assets/img/star.png')}}">
                        <img class="aboutstarimg" src="{{asset('assets/img/star.png')}}">
                    </div>
                    <p class="letter14">Best experience ever</p>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('inline-js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"
        integrity="sha512-9CWGXFSJ+/X0LWzSRCZFsOPhSfm6jbnL+Mpqo0o8Ke2SYr8rCTqb4/wGm+9n13HtDE1NQpAEOrMecDZw4FXQGg=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    //define variables
    var allchatdata = [];
    var allPlayer = [];
    
    //set current chat client
    function currentchat($id)
    {
        $("#secondid").val($id);
    }
    $(document).ready(function () {
        
        $('.owl-carousel').owlCarousel({
            nav: true,
            dots: false,
            margin: 10,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 2,
                },
                600: {
                    items: 4,
                },
                1000: {
                    items: 6,
                }
            }
        });
        //get allchatdata
        
        $.ajax({
            type:'post',
            url:"{{url('getMessage')}}",
            data:{
                _token:'<?php echo csrf_token() ?>',
            },
            success:function(data){
                var firstid = $("#firstid").val();
                for (var i = 0; i <= data.length - 1; i++) {
                	if (data[i]['sid'] == firstid) {
                	    allchatdata.push([data[i]['rid'], data[i]['id'], data[i]['message']]);
                	}
                	else if(data[i]['rid'] == firstid){
                		allchatdata.push([data[i]['sid'], data[i]['id'], data[i]['message']]);
                	}
                }
                for (var i = 0; i <= allchatdata.length - 2; i++) {
                    for (var j = i+1; j <= allchatdata.length - 1; j++) {
                        if ( allchatdata[i][0] == allchatdata[j][0] )
                        {
                            allchatdata[i][0] = 'delete';
                        }
                    }
                }
                for (var k = 0; k <= allchatdata.length -1; k++) {
                    if ( allchatdata[k][0] == 'delete' )
                    {
                        allchatdata.splice(k,1);
                        k--;
                    }
                }
                allchatdata.reverse();
                
                //get allPlayer data
                $.ajax({
                    type:'post',
                    url:"{{url('getPlayer')}}",
                    data:{
                        _token:'<?php echo csrf_token() ?>',
                    },
                    success:function(data){	 
                        for ( var i = 0; i <= data.length - 1; i ++) {
                            allPlayer.push([data[i]['id'], data[i]['name']]);
                        }
                        for (var i = 0; i <= allPlayer.length -1; i++)
                            for ( var j = 0; j <= allchatdata.length - 1; j++)
                            {
                                if (allchatdata[j][0] == allPlayer[i][0])
                                {
                                    allchatdata[j][0] = allPlayer[i][1];    
                                }
                            }
                            //append allchatdata
                            $("#allchatbodyul").html("");
                            var allchatdatacontent = '';
                            for ( var i = 0; i <= allchatdata.length -1; i++)
                            {
                                allchatdatacontent += '<li onclick="currentchat(' + allchatdata[i][0] +')"><img class="allchatimg" src="{{asset('assets/img/profile_pic/user1.jpg')}}"><p class="smallchatclientname letter18 blackletter">' + allchatdata[i][0] + '</p><p class="lastmessage letter14 greyletter">' + allchatdata[i][2].slice(0, 25) + '...</p></li>';
                            }
                            $("#allchatbodyul").append(allchatdatacontent);
                    }
                });
                
                
                
                
                
                
            }
        });
       
        

        
    });
</script>
@endsection
