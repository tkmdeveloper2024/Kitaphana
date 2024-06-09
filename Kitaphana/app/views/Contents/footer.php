    <script src="app/views/Contents/assets/js/bootstrap.bundle.min.js"></script>
    <script src="app/views/Contents/assets/js/bootstrap.min.js"></script>
    <script src="app/views/Contents/assets/js/jquery-3.7.1.min.js"></script>
    <script>
    // Change the label text when a file is selected
    let file_Name_Display = document
        .getElementById("fileNameDisplay");

    function updateFileName(input) {
        if (input.files.length > 0) {
            file_Name_Display
                .innerText = input.files[0].name;
            file_Name_Display
                .classList.remove("bg-light");
            file_Name_Display
                .classList
                .add("bg-light", "text-dark");
        } else {
            file_Name_Display
                .innerText = "Choose file";
            file_Name_Display
                .classList.remove("bg-primary", "text-white");
            file_Name_Display
                .classList
                .add("bg-light", "text-secondary");
        }
    }
    </script>
</body>

</html>