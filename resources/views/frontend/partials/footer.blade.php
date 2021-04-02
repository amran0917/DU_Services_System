
<footer style=" left: 0; position: fixed;
                bottom: 0;
                width: 100%;
                padding:8px;
                margin-top: 10px;
                background-color: rgb(56, 84, 145);">
    <p class="text-center" style="color: wheat">&copy;<span id="year"></span> All rights reserved|DU Services site</p>
</footer>

<script>
    var year = new Date().getFullYear();
    document.getElementById('year').innerHTML= year;
</script>