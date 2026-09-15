<!-- Footer -->
<footer class="text-center text-lg-start text-white bg-dark pt-4">
  <!-- Grid container -->
  <div class="container p-4 pb-0">
    <!-- Section: Links -->
    <section class="">
      <!--Grid row-->
      <div class="row">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
          <h6 class="text-uppercase mb-4 fw-bold">
            Zapatos el cordon
          </h6>
          <p>
            En Zapatos El Cordón creemos que cada paso es una oportunidad para expresar quién sos. Por eso combinamos comodidad, calidad y diseño para acompañarte en cada momento, con calzado pensado para vos y tu estilo. Atamos estilo a cada paso, para que cada camino empiece con el pie derecho.
          </p>
        </div>
        <!-- Grid column -->

        <hr class="w-100 clearfix d-md-none" />

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
          <h6 class="text-uppercase mb-4 fw-bold">Productos</h6>
          <?php 
            foreach ($zapatillas ?? [] as $zapatilla) {
              extract($zapatilla);
              include("components/shared/footer/footer_link_item.php");
            }
          ?>
        </div>
        <!-- Grid column -->

        <hr class="w-100 clearfix d-md-none" />

        <!-- Grid column -->
        <hr class="w-100 clearfix d-md-none" />

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
          <h6 class="text-uppercase mb-4 fw-bold">Contacto</h6>
          <?php include_once("components/shared/footer/footer_contact_handler.php"); ?>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
          <h6 class="text-uppercase mb-4 fw-bold">Seguinos!!</h6>

          <!-- Facebook -->
          <a
            class="btn btn-outline-light rounded-circle m-1"
            href="#!"
            role="button"
          >
            <i class="fab fa-facebook-f"></i>
          </a>
          <!-- Instagram -->
          <a
            class="btn btn-outline-light rounded-circle m-1"
            href="#!"
            role="button"
          >
            <i class="fab fa-instagram"></i>
          </a>
          <!-- WhatsApp -->
          <a
            class="btn btn-outline-light rounded-circle m-1"
            href="#!"
            role="button"
          >
            <i class="fab fa-whatsapp"></i>
          </a>
        </div>
      </div>
      <!--Grid row-->
    </section>
    <!-- Section: Links -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div
    class="text-center p-4 border-top border-secondary mt-4">
    © 2026 Copyright:
    <a class="text-white" href="https://zapatoselcordon.com.ar/">Zapatos El Cordon</a>
  </div>
</footer>
</body>