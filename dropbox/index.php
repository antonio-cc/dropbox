
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dropbox Pre-built components</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <script type="text/javascript" src="https://www.dropbox.com/static/api/2/dropins.js" id="dropboxjs"
            data-app-key="e4fnpyfwpzdgoe6"></script>
    <style>
        #chooser-demo {
            height: 100px;
            font-size: 24px;
        }
    </style>
</head>
<body>
<section class="section">
    <div class="container">
        <h1 class="title has-text-primary">Dropbox Pre-built components</h1>

        <div class="tile is-ancestor">
            <div class="tile is-parent">
                <article class="tile is-child box">
                    <h2 class="title"><a href="https://www.dropbox.com/developers/chooser">Chooser</a></h2>
                    <p class="subtitle">The Chooser is the fastest way to get files from Dropbox into your web, Android, or iOS app. It's a small component that enables your app to get files from Dropbox without having to worry about the complexities of implementing a file browser, authentication, or managing uploads and storage.</p>
                    <div id="chooser-demo"></div>
                    <article class="message is-success" id="selected-link">
                        <div class="message-header">
                            <p>Success: Selected Link</p>
                        </div>
                        <div class="message-body">
                            <a href="" id="link"></a>
                        </div>
                    </article>
                </article>

            </div>

        </div>

    </div>

</section>

<script>

    let selectedLink = document.getElementById("selected-link");
    selectedLink.style.display = "none";
    options = {

        // Required. Called when a user selects an item in the Chooser.
        success: function(files) {
            selectedLink.style.display = "block";
            let link = document.getElementById('link');
            link.innerHTML = files[0].link;
            link.href = files[0].link;
        },

        // Optional. Called when the user closes the dialog without selecting a file
        // and does not include any parameters.
        cancel: function() {
            selectedLink.style.display = "none";
            alert("Canceled")
        },

        // Optional. "preview" (default) is a preview link to the document for sharing,
        // "direct" is an expiring link to download the contents of the file. For more
        // information about link types, see Link types below.
        linkType: "preview", // or "direct"

        // Optional. A value of false (default) limits selection to a single file, while
        // true enables multiple file selection.
        multiselect: false, // or true

        // Optional. This is a list of file extensions. If specified, the user will
        // only be able to select files with these extensions. You may also specify
        // file types, such as "video" or "images" in the list. For more information,
        // see File types below. By default, all extensions are allowed.
        extensions: ['.pdf', '.doc', '.docx', '.png'],

        // Optional. A value of false (default) limits selection to files,
        // while true allows the user to select both folders and files.
        // You cannot specify `linkType: "direct"` when using `folderselect: true`.
        folderselect: false, // or true

        // Optional. A limit on the size of each file that may be selected, in bytes.
        // If specified, the user will only be able to select files with size
        // less than or equal to this limit.
        // For the purposes of this option, folders have size zero.
        //sizeLimit: 1024, // or any positive number
    };

    var button = Dropbox.createChooseButton(options);
    document.getElementById("chooser-demo").appendChild(button);

</script>
</body>
</html>
