<link href="https://npmcdn.com/pdfjs-dist/web/pdf_viewer.css" rel="stylesheet"/>
<link
    rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
    integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr"
    crossorigin="anonymous"
/>
<style>
    #container > *:not(:first-child) {
        border-top: solid 1px black;
    }
</style>

<style>
    /** {*/
    /*    margin: 0 auto;*/
    /*    padding: 0 auto;*/
    /*}*/

    .top-bar {
        background: #333;
        color: #fff;
        padding: 1rem;
        display: flex;
        justify-content: center;
    }
    .ac{
        /* Center horizontally*/
        margin: 0 auto;
    }

    .btn_book {
        background: coral;
        color: #fff;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 0.7rem 2rem;
        border-radius: 50%;
    }

    .btn_book:hover {
        opacity: 0.9;
    }

    .page-info {
        margin-left: 1rem;
    }

    .error {
        background: orangered;
        color: #fff;
        padding: 1rem;
    }
    .clear{
        clear: both;
    }
</style>
