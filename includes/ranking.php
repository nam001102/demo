<section class="vh-100 ranking-bg overflow-hidden d-flex align-items-start justify-content-start">
  <div class="container-fluid h-100  align-items-start justify-content-start">
    <div class="glassContainer text-white border-0 shadow-lg vh-90">
      <div class="card-body p-4 text-center position-relative">
        <!-- Scrollable content -->
        <div class="scroll-container col-md-12" id="rankingList">
          <?php for ($i = 1; $i <= 100; $i++): ?>
            <div class="row align-items-center py-1 px-2 mb-2">
              <div class="col-auto">
                <div class="bg-success-subtle rounded-circle" style="width: 10px; height: 10px;"></div>
              </div>
              <div class="col fw-bold">NGUYEN DUC TRUNG</div>
              <div class="col-auto">Hạng <?= $i ?></div>
              <div class="col-auto">Cấp <?= rand(1, 10) ?></div>
            </div>
          <?php endfor; ?>
        </div>

      </div>
    </div>
  </div>

</section>


<svg style="display: none">
  <filter id="container-glass" x="0%" y="0%" width="100%" height="100%">
    <feTurbulence type="fractalNoise" baseFrequency="0.008 0.008" numOctaves="2" seed="92" result="noise" />
    <feGaussianBlur in="noise" stdDeviation="0.02" result="blur" />
    <feDisplacementMap in="SourceGraphic" in2="blur" scale="77" xChannelSelector="R" yChannelSelector="G" />
  </filter>
</svg>