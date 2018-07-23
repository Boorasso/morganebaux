</main>
<footer>
    <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="vue/js/jquery.fancybox.min.js"></script>
    <script src="vue/js/main.js"></script>
    <!--Admin view only-->
    <?php if ($login) : ?>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <script src="vue/js/admin-scripts.js"></script>
    <?php endif; ?>
</footer>
</body>
</html>
