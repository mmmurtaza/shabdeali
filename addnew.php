<?php
session_start();
if(!isset($_SESSION['authorized']) || $_SESSION['authorized'] != true ) {
    header('Location:/shabdeali/index.php');
}

require_once 'db_setup.php';

$id = 1;
$sql = "Select * from nazamo where id='$id'";
$nazm = db_query_one($sql);

// if (isset($_POST['title'])) {
//     $id = sanitize($_POST['id']);
//     $myhead = sanitize($_POST['title']);
//     $myqafiya = sanitize($_POST['qafiya']);
//     $mylang = sanitize($_POST['lang']);
//     $myremarks= sanitize($_POST['remarks']);

//     $mywdate = sanitize($_POST['wdate']);
//     $mysinf= sanitize($_POST['Sinf']);
//     $mymiqaat = sanitize($_POST['Miqaat']);

//     $sql2 = "UPDATE nazamo SET Head='$myhead',qafiya='$myqafiya',Lang='$mylang',w_date='$mywdate',Sinf='$mysinf',Miqaat='$mymiqaat',last_updated=NOW(),remarks='$myremarks' WHERE id = '$id';";

//     // echo $sql2;

//     $ret = db_execute($sql2);

//     // $sql = "Select * from nazamo where id='$id'";
//     // $nazm = db_query_one($sql);
// }


?>

<!DOCTYPE html>
<html style="margin: 0px;">

<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Noto Nastaliq Urdu">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amiri">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open Sans">


    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/markdown-it/13.0.1/markdown-it.min.js"
        integrity="sha512-SYfDUYPg5xspsG6OOpXU366G8SZsdHOhqk/icdrYJ2E/WKZxPxze7d2HD3AyXpT7U22PZ5y74xRpqZ6A2bJ+kQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>


    <script src="https://cdn.jsdelivr.net/npm/markdown-it-attrs@4.1.4/markdown-it-attrs.browser.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/marked/marked.min.js"></script>

    <script src="bootstrap-autocomplete.js"></script>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <style type="text/css">
        /*FOR PRINTING PURPOSES DON'T TOUCH*/

        @media (min-width: 550px) {
            .col-md {
                flex: 1 0 0%
            }

            .row-cols-md-auto>* {
                flex: 0 0 auto;
                width: auto
            }

            .row-cols-md-1>* {
                flex: 0 0 auto;
                width: 100%
            }

            .row-cols-md-2>* {
                flex: 0 0 auto;
                width: 50%
            }

            .row-cols-md-3>* {
                flex: 0 0 auto;
                width: 33.3333333333%
            }

            .row-cols-md-4>* {
                flex: 0 0 auto;
                width: 25%
            }

            .row-cols-md-5>* {
                flex: 0 0 auto;
                width: 20%
            }

            .row-cols-md-6>* {
                flex: 0 0 auto;
                width: 16.6666666667%
            }

            .col-md-auto {
                flex: 0 0 auto;
                width: auto
            }

            .col-md-1 {
                flex: 0 0 auto;
                width: 8.33333333%
            }

            .col-md-2 {
                flex: 0 0 auto;
                width: 16.66666667%
            }

            .col-md-3 {
                flex: 0 0 auto;
                width: 25%
            }

            .col-md-4 {
                flex: 0 0 auto;
                width: 33.33333333%
            }

            .col-md-5 {
                flex: 0 0 auto;
                width: 41.66666667%
            }

            .col-md-6 {
                flex: 0 0 auto;
                width: 50%
            }

            .col-md-7 {
                flex: 0 0 auto;
                width: 58.33333333%
            }

            .col-md-8 {
                flex: 0 0 auto;
                width: 66.66666667%
            }

            .col-md-9 {
                flex: 0 0 auto;
                width: 75%
            }

            .col-md-10 {
                flex: 0 0 auto;
                width: 83.33333333%
            }

            .col-md-11 {
                flex: 0 0 auto;
                width: 91.66666667%
            }

            .col-md-12 {
                flex: 0 0 auto;
                width: 100%
            }

            .offset-md-0 {
                margin-left: 0
            }

            .offset-md-1 {
                margin-left: 8.33333333%
            }

            .offset-md-2 {
                margin-left: 16.66666667%
            }

            .offset-md-3 {
                margin-left: 25%
            }

            .offset-md-4 {
                margin-left: 33.33333333%
            }

            .offset-md-5 {
                margin-left: 41.66666667%
            }

            .offset-md-6 {
                margin-left: 50%
            }

            .offset-md-7 {
                margin-left: 58.33333333%
            }

            .offset-md-8 {
                margin-left: 66.66666667%
            }

            .offset-md-9 {
                margin-left: 75%
            }

            .offset-md-10 {
                margin-left: 83.33333333%
            }

            .offset-md-11 {
                margin-left: 91.66666667%
            }

            .g-md-0,
            .gx-md-0 {
                --bs-gutter-x: 0
            }

            .g-md-0,
            .gy-md-0 {
                --bs-gutter-y: 0
            }

            .g-md-1,
            .gx-md-1 {
                --bs-gutter-x: 0.25rem
            }

            .g-md-1,
            .gy-md-1 {
                --bs-gutter-y: 0.25rem
            }

            .g-md-2,
            .gx-md-2 {
                --bs-gutter-x: 0.5rem
            }

            .g-md-2,
            .gy-md-2 {
                --bs-gutter-y: 0.5rem
            }

            .g-md-3,
            .gx-md-3 {
                --bs-gutter-x: 1rem
            }

            .g-md-3,
            .gy-md-3 {
                --bs-gutter-y: 1rem
            }

            .g-md-4,
            .gx-md-4 {
                --bs-gutter-x: 1.5rem
            }

            .g-md-4,
            .gy-md-4 {
                --bs-gutter-y: 1.5rem
            }

            .g-md-5,
            .gx-md-5 {
                --bs-gutter-x: 3rem
            }

            .g-md-5,
            .gy-md-5 {
                --bs-gutter-y: 3rem
            }
        }
    </style>
    <title>Add New</title>

    <link rel="stylesheet" href="qasaid.css">
    <style type="text/css">

        .superscript {
            vertical-align: super;
            font-size: 15px;

        }

        .name {
            text-align: left;
            text-align-last: left;
            padding-top: 20px;
            font-size: 20px;
        }

        .title {
            text-align-last: center;
            color: red;
            /*font-family: Decotype naskh Variants;*/
            font-size: 2rem;
            padding-bottom: 10px;
        }


        .red {
            color: orangered;
        }

        textarea {
            /* font-family: me_quran; */
            direction: rtl;
        }

        #title {
            direction: rtl;
            font-size: 1.5rem;
        }
        #markdown {
            font-size: 1.5rem;
        }

        .main {
            /*    font-size: 24px;*/
            text-align: justify;
            -moz-text-align-last: justify;
            text-align-last: justify;
            text-justify: inter-word;
            /* background-image: url("page.jpg"); */
            background-position: center;
            /* Center the image */
            background-repeat: no-repeat;
            /* Do not repeat the image */
            background-size: cover;
            /* Resize the background image to cover the entire container */
            /*height: 297mm;*/
            /*width: 210mm;*/
            padding: 10px 10px 10px 10px;

        }



        /* Container for the search and list */
        .mycontainer {
            background-color: #ffffff; /* White background for the container */
            padding: 24px 32px; /* Padding inside the container (equivalent to p-6 sm:p-8) */
            border-radius: 8px; /* Rounded corners (equivalent to rounded-lg) */
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05); /* Shadow (equivalent to shadow-xl) */
            width: 100%; /* Full width */
            /* max-width: 448px; Max width (equivalent to max-w-md) */
            direction: rtl;
            
        }


        /* Search input field styling */
        #searchBox {
            width: 100%; /* Full width */
            padding: 10px 16px; /* Padding (equivalent to px-4 py-2) */
            margin-bottom: 24px; /* Margin bottom (equivalent to mb-6) */
            color: #4a4a4a; /* Text color (equivalent to text-gray-700) */
            background-color: #f9f9f9; /* Light background (equivalent to bg-gray-50) */
            border: 1px solid #cccccc; /* Border (equivalent to border-gray-300) */
            border-radius: 6px; /* Rounded corners (equivalent to rounded-md) */
            outline: none; /* Remove default outline */
            transition: all 0.2s ease-in-out; /* Smooth transition for focus effects */
            box-sizing: border-box; /* Ensure padding doesn't add to total width */
        }

        #searchBox:focus {
            border-color: #3b82f6; /* Blue border on focus (equivalent to focus:border-transparent) */
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.5); /* Blue ring on focus (equivalent to focus:ring-2 focus:ring-blue-500) */
        }

        /* List container styling */
        #myList {
            list-style: none; /* Remove bullet points */
            padding: 0; /* Remove default padding */
            margin: 0; /* Remove default margin */
            max-height: 320px; /* Max height for scrolling (equivalent to max-h-80) */
            overflow-y: auto; /* Enable vertical scrolling */
            border: 1px solid #e5e5e5; /* Border (equivalent to border-gray-200) */
            border-radius: 6px; /* Rounded corners (equivalent to rounded-md) */
        }

        /* List item styling */
        #myList li {
            padding: 12px 16px; /* Padding (equivalent to px-4 py-3) */
            border-bottom: 1px solid #e5e5e5; /* Bottom border (equivalent to border-b border-gray-200) */
            color: #4a4a4a; /* Text color (equivalent to text-gray-700) */
            cursor: pointer; /* Indicate clickable items */
            transition: background-color 0.15s ease-in-out; /* Smooth hover transition */
        }

        /* Remove bottom border from the last list item */
        #myList li:last-child {
            border-bottom: none; /* Equivalent to last:border-b-0 */
        }

        /* Hover effect for list items */
        #myList li:hover {
            background-color: #eff6ff; /* Light blue background on hover (equivalent to hover:bg-blue-50) */
        }

        /* No results message styling */
        #noResults {
            display: none; /* Hidden by default */
            padding: 12px 16px; /* Padding */
            text-align: center; /* Center text */
            color: #888888; /* Gray text (equivalent to text-gray-500) */
        }

        /* Loading message styling */
        #loadingMessage {
            padding: 12px 16px;
            text-align: center;
            color: #555555;
        }


    </style>
</head>

<div id="template" style="display:none">
    <div class="row bayt" dir="rtl">
        <div class="misra myright">
            <div style="text-align: justify; text-justify: inter-word;">
                ${splittedLines[i]}
            </div>
        </div>

        <div class="misra myleft">
            <div style="text-align: justify; text-justify: inter-word; ">
                ${splittedLines[i+1]}
            </div>
        </div>
    </div>
</div>

<body>


    <div class="container-xl" style="margin: 0;">
        
        <!-- Search -->
        <div class="row d-print-none">
            <div class="col-md-10 my-3">

                
               
            </div><!-- /col -->
        </div><!-- /row Search-->

 <div class="mycontainer">  

        <input type="text" id="searchBox" placeholder="Search for items..." aria-label="Search items">

        <ul id="myList">
            </ul>

        <div id="noResults">No results found.</div>
        <div id="loadingMessage">Loading items...</div>
    </div>

<script src="search.js"></script>





        <div class="row">
            <!-- side part form -->
            <div class="col-md-6 col-sm-12 d-print-none">
                    <form action="" method="post">

                    <!-- title -->
                    <div class="row">
                        <div class="col-12">   
                        <div class="form-group mb-2">
                            
                         
                            <input type="text" name="title" id="title" class="form-control" placeholder="Title" onchange="titleSetter()" value="<?php echo $nazm['Head'];?>">
                        </div>
                        </div>
                    </div><!-- row -->
                        
                    
                   
                    <!-- bija elements 1 -->
                    <div class="row align-items-center">
                        <div class="col-2">
                            <div class="form-group">
                                
                            <label for="qafiya">Qafiya</label>
                            <input type="text" name="qafiya" id="qafiya" class="form-control" value="<?php echo $nazm['qafiya']; ?>">
                        </div>

                        </div>
                        <div class="col-2">
                            <label for="qafiya">Lang</label>
                            <input type="text" name="lang" id="lang" class="form-control" value="<?php echo $nazm['Lang']; ?>">
                        </div>

                        <div class="col-6">
                            <label for="remarks">Remarks</label>
                            <input type="text" name="remarks" id="remarks" class="form-control" value="<?php echo $nazm['remarks']; ?>">
                        </div>

                        <div class="col-2">
                            <button type="submit" class="btn btn-primary">Submit</button>

                        </div>
                    </div>
                        
                     <!-- / bija elements  1 -->

                   


                   <!-- bija elements 2 -->
                    <div class="row align-items-center">
                        <div class="col-4">
                            <div class="form-group">
                                
                                <label for="wdate">Writ Date</label>
                                <input type="text" name="wdate" id="wdate" class="form-control" value="<?php echo $nazm['w_date']; ?>">
                            </div>

                        </div>
                        <div class="col-4">
                            <label for="Sinf">Sinf</label>
                            <input type="text" name="Sinf" id="Sinf" class="form-control" value="<?php echo $nazm['Sinf']; ?>">
                        </div>

                        <div class="col-4">
                            <label for="Miqaat">Miqaat</label>
                            <input type="text" name="Miqaat" id="Miqaat" class="form-control" value="<?php echo $nazm['Miqaat']; ?>">

                            <input type="hidden" name="id" id="id" value="<?php echo $id; ?>">
                        </div>

                    </div>
                        
                     <!-- / bija elements  2 -->
                    
                    <p></p>
                    <textarea name="markdown" id="markdown" rows="12" class="form-control" onchange="update()"
                    style="height:-webkit-fill-available;"><?php echo $nazm['Mawad'] ?> </textarea>
                    
                    <p></p>
                </form>

                    <button onclick="saveAJAX()" class="btn btn-success col-2" id="save"
                    style="text-align: center;">
                    <div style="justify-content:center;display: flex;"><img
                            src="https://img.icons8.com/ios/50/null/save--v1.png"></div>
                    </button>

                    <!-- font and font size -->
                    <div class="row">
                        <div class="col-6">
                            <select id="font" class="custom-select font form-control" onclick="optionone(this)"
                            onchange="changefont()">
                            <option >Font</option>
                            <option >Amiri</option>
                            <option>Decotype Naskh Variants</option>
                            <option>me_quran</option>
                            <option selected>kanzalmarjaan</option>
                            <option>Decotype Naskh</option>
                            <option>Noto Nastaliq Urdu</option>
                            <option>Open Sans</option>
                        </select>
    
                        </div>
                        <div class="col-6">
                            <input type="number" name="fontsize" id="fontsize" class="form-control" placeholder="Font Size"
                            onchange="fontSizeChanger()" value="25">
    
                        </div>
                    </div><!-- /row -->


            </div>




            <div class="col-md-6 col-sm-12" style="margin:0;">
                <div id="qasaidarea"  style="font-size: 25px;" ></div>
            </div>
        
        </div><!-- /row below pagi-->

    </div><!-- /container -->


    <script type="text/javascript">

        let myqas = {};
        //     $.ajax({url: "server.php?cmd=get", 
        //         type: "POST",
        //         data: {nid:"3"},
        //         success: function(result){
        //             // console.log(result);
        //             myqas = JSON.parse(result);
        //             $("#markdown").val(myqas.Mawad);

        $(function(){
            update();
            changefont();
        });


        qasidaarea = document.querySelector("#qasaidarea")

        masterdict = {
            title: "",
            text: "",
            font: "",
            fontsize: "",
            margins: "",
            background: "",
            abyaatpp: "",
            template: gettemplate(),
        }


        const md = window.markdownit().use(markdownItAttrs, {
            // optional, these are default options
            leftDelimiter: '{',
            rightDelimiter: '}',
            allowedAttributes: [] // empty array = all attributes are allowed
        })

        font = "me_quran"

        function update() {
            if (document.querySelector("#qasaidarea").children) {
                document.querySelector("#qasaidarea").innerHTML = ""
            }
                // markdown = md.render(document.querySelector("#markdown").value)


                // markdown = document.querySelector("#markdown").value
                // markdown = markdown.slice(3, markdown.length);
                // markdown = markdown.replace(/\*/g, '\n');
                // markdown = markdown.replace(/\n\s*\n/g, '\n');
                // splittedLines = markdown.split('\n');
                begin()
            
            // document.querySelector("#qasaidarea").innerHTML = markdown
        }

        function gettemplate() {
            var template = document.createElement("div")
            document.querySelector("#template").style.display = 'block'
            template.innerHTML = document.querySelector("#template").innerHTML
            document.querySelector("#template").style.display = 'none'
            lines = document.querySelector("#template").children.length
            return template
        }

        function new_page(parent, pageno) {
            let page = document.createElement('div');
            page.setAttribute('class', 'main normalmargins');
            page.setAttribute('id', "page" + pageno)
            page.setAttribute('style', 'font-size:24px;')
            backgroundSetString = 'background-image:' + masterdict.background;
            page.setAttribute("style", backgroundSetString)
            //page.style.fontFamily = font
            document.querySelector('#qasaidarea').append(page)
            parent = page
            children = parent.childNodes

            if (pageno == 1) {
                div = document.createElement('div')
                div.innerHTML = ""
                div.setAttribute('class', "title col-12 text-center")
                div.setAttribute('style', 'text-align:center;')
                parent.append(div)
            }
            pageno = pageno + 1
            return [parent, pageno]
        }

        function new_bait(parent, splittedLines, i, divheight, arrangement) {
            let div = document.createElement('div');
            //div.setAttribute('class', 'row');
            //html block template for bait
            div.innerHTML = eval('`' + arrangement.innerHTML + '`');
            parent.append(div);
        }

        function begin() {

            // setting functions required variables
            // Setting Number of Misras in a Page - Hardcoded for now
            //parseInt(document.querySelector("#abyaat").value)*misraPerBait
            var misraperpage = 30
            misraPerBait = 2
            var qasida = document.querySelector("#markdown").value
            // qasida = markdown;
            // SETTING UP ORIGINAL TEXT AS ONE MISRA IN EACH ELEMENT OF A LIST
            // qasida = md.render(qasida)
            // qasida = qasida.slice(3, qasida.length)
            qasida = qasida.replace(/\*/g, '\n');
            qasida = qasida.replace(/\n\s*\n/g, '\n');

            var splittedLines = qasida.split('\n');
            // splittedLines.pop()

            var parent = document.querySelector("#qasaidarea");
            let divheight = 240 / 15

            let pageno = 1
            let arrangement = gettemplate()
            for (var i = 0; i < splittedLines.length; i++) {

                if (i % misraPerBait == 0) {

                    if (i % misraperpage == 0) {
                        [parent, pageno] = new_page(parent, pageno)

                    }

                    new_bait(parent, splittedLines, i, divheight, arrangement)
                }

            }
            changefont()
            // setmargins()
            titleSetter()
            div = document.createElement("div")
            div.classList.add('name')
            parent.append(div)
            // nameAdder()
            document.querySelector('button').style.display = 'block'
            document.querySelector('#save').style.display = 'block'
            masterdict.text = markdown
        }

        function changefont() {
            qasaidarea.style.fontFamily = document.querySelector("#font").options[document
                .querySelector("#font").selectedIndex].value
            masterdict.font = document.querySelector("#font").options[document.querySelector("#font")
                .selectedIndex].value
        }

        function optionone(element) {
            element.options[0].remove()
            element.onclick = changefont

        }

        // function setmargins() {
        //     let digit = document.querySelector("#margins").value
        //     if (digit > 75) {
        //         for (var i = 0; i < document.querySelector("#qasaidarea").children.length; i++) {
        //             qasaidarea.children[i].style.paddingLeft = digit + "px";
        //             qasaidarea.children[i].style.paddingRight = digit + "px";
        //         }
        //         masterdict.margins = digit;
        //     }

        // }

        function changebackground(element) {
            element.style.backgroundImg = image.src
        }

        function updateImageDisplay() {
            var reader = new FileReader();
            //Read the contents of Image File.
            reader.readAsDataURL(document.querySelector("#background").files[0]);
            reader.onload = function (e) {
                //Initiate the JavaScript Image object.
                var image = new Image();

                //Set the Base64 string return from FileReader as source.
                image.src = e.target.result;
                //Validate the File Height and Width.
                image.onload = function () {
                    if (parseInt((this.height / this.width) * 10) != 14) {
                        alert("Image must have aspect ratio of A4 size sheet");
                        return false;
                    }
                    alert("Uploaded image has valid Height and Width.");
                    window.masterdict.background = "url(" + e.target.result + ")"
                    for (var i = 0; i < document.querySelector("#qasaidarea").children
                        .length; i++) {
                        document.querySelector("#qasaidarea").children[i].style
                            .backgroundImage = "url(" + e.target.result + ")"
                        //window.masterdict.background = "url(" + e.target.result + ")"
                    }

                    return true;
                };
            }
        }

        // document.querySelector("#background").addEventListener('change', updateImageDisplay);

        function titleSetter() {
            document.querySelector(".title").innerHTML = md.render(document.querySelector("#title")
                .value)
            masterdict.title = document.querySelector("#title").value
        }

        function fontSizeChanger() {
            if (document.querySelector("#fontsize").value > 19) {
                qasaidarea.style.fontSize = document.querySelector("#fontsize").value + 'px';
                masterdict.fontsize = document.querySelector("#fontsize").value;
            }
        }

        function saveJSON() {
            // var jsonneddict = JSON.stringify(masterdict)
            // console.log(jsonneddict)
            const a = document.createElement("a");
            a.href = URL.createObjectURL(new Blob([JSON.stringify(masterdict, null, 2)], {
                type: "text/plain"
            }));
            a.setAttribute("download", "data.txt");
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }

        function saveAJAX(){
            let myData = {};
            myData.id = <?php echo $id ?>;
            myData.Mawad = $("#markdown").val();
            console.log(myData);
            $.ajax({
                type: "POST",
                url: "server.php?cmd=save",
                data: myData,
                success: function(ret){ console.log(ret)}
            });
        }



    </script>

    <script>
        //SCRIPT FOR HANDLING UPLOADED FILES

        function handleFileSelect(evt) {
            let files = evt.target.files; // FileList object

            // use the 1st file from the list
            let f = files[0];

            let reader = new FileReader();

            // Closure to capture the file information.
            reader.onload = (function (theFile) {
                return function (e) {
                    try {
                        console.log(JSON.parse(e.target.result));
                        window.masterdict = JSON.parse(e.target.result);
                        toggleModal()
                        assignValues(masterdict)

                        //begin()

                    } catch (error) {
                        console.log(error)
                        console.log('You have uploaded the wrong File')
                    }
                };
            })(f);

            // Read in the image file as a data URL.
            reader.readAsText(f);
        }

        // document.getElementById('savedupload').addEventListener('change', handleFileSelect, false);

        function assignValues(dictionary) {
            document.querySelector("#title").value = dictionary.title
            qasaidarea.style.fontFamily = dictionary.font
            document.querySelector("#margins").value = dictionary.margins
            document.querySelector("#fontsize").value = dictionary.fontsize
            document.querySelector("#name").value = dictionary.name
            document.querySelector("#template").value = dictionary.template
            document.querySelector("#markdown").value = dictionary.text.slice(0, dictionary.text
                .length - 5)
            begin()

        }


        // function nameAdder() {
        //     name = document.querySelector("#name").value
        //     document.querySelector(".name").innerHTML = name
        //     masterdict.name = name
        // }
    </script>



</body>

</html>