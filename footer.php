  <footer id="footer" class="source-org vcard copyright" role="contentinfo">
    <section class="wrapper">
      <?php get_sidebar(); ?>
    </section><!-- #wrapper -->
  </footer><!-- footer -->
  <?php
    $code = get_option('swt_custom_analytics_code'); echo stripslashes($code);
  ?>
  <?php wp_footer();?>
</body>
</html>
