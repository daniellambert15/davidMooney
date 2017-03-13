<?php include "head.php"; ?>

    <div class="col-xs-12 col-md-9">
      <?php
      if(isset($page['contentTitle'])){ ?>
        <h2>
        <?php
        echo $page['contentTitle'];
      ?></h2><?php } ?>
      <?php
      if(isset($page['content'])){
        echo $page['content'];
      } ?>
      <?php
      if(isset($page['formId']) && $page['formId'] < 8){ ?>
          <div class="alert alert-danger" role="alert">Have you read and fully understood this section? Click the "Accept Page" button and then fill out the short question. If you would need extra information please contact David Mooney on 07887 552 442</div>
        <div class="form-group">
            <button type="submit" onclick="acceptPage()" class="btn btn-success col-xs-12 ">Accept Page</button>
        </div>

        <div class="form-group" id="shortQuestion" style="display:none">
          <label for="postEmailAddress">Short question</label>
          <p>
          <?php
          if(isset($page['question'])){
            echo $page['question'];
          } ?></p>


          <input type="text" onkeyup="answer(this.value)" class="form-control" id="answer" name="answer" placeholder="Answer">
        </div>
        <span id="output" style="display:none"></span>
      <?php } ?>

      <?php
      if(isset($page['formId']) && $page['formId'] == 8){ ?>
      <form  method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>?action=submitForm">
        <div class="form-group">
          <label for="name">Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="email">
        </div>
        <div class="form-group">
          <label for="contactNumber">Contact Number</label>
          <input type="text" class="form-control" id="contactNumber" name="contactNumber" placeholder="Contact Number">
        </div>
        <div class="form-group">
          <label for="address">Address</label>
          <textarea class="form-control" id="address" name="address" placeholder="Address"></textarea>
        </div>
        <button type="submit" class="btn btn-default">Continue</button>
      </form>
      <?php } ?>
      <nav>
        <ul class="pager">
          <?php if(isset($page['urlPrevious']) && $pId != 1){ ?>
            <li><a href="?id=<?php echo $page['urlPrevious']; ?>"><?php echo $page['buttonPreviousText']; ?></a></li>
            <?php } ?>
            <?php if(isset($page['urlNext'])){ ?>
              <li id="buttonNext" style="display:none;"><a href="?id=<?php echo $page['urlNext']; ?>"><?php echo $page['buttonNextText']; ?></a></li>
            <?php } ?>
            <?php if(isset($page['urlNext']) && $introducer->hasSignedPage($pId)){ ?>
            <li id="buttonNextCompleted"><a href="?id=<?php echo $page['urlNext']; ?>"><?php echo $page['buttonNextText']; ?></a></li><?php } ?>
          </ul>
        </nav>
    </div>
    <div class="col-xs-12 col-md-3">
      <div class="sidebar-module">
        <h4>Completed Sections</h4>
        <ol class="list-unstyled">
          <?php for($i = 1; $i <= 7; $i++){ ?>
          <?php if($introducer->hasSignedPage($i)){ ?>
            <li><a href="?id=<?php echo $i ?>">Section <?php echo $i ?></a></li>
          <?php } } ?>
        </ol>
      </div>
      <div class="sidebar-module">
        <h4>Not Completed Sections</h4>
        <ol class="list-unstyled">
          <?php for($i = 1; $i <= 7; $i++){ ?>
          <?php if($introducer->hasNotSignedPage($i)){ ?>
            <li><a href="?id=<?php echo $i ?>">Section <?php echo $i ?></a></li>
          <?php } } ?>
        </ol>
      </div>
      <div class="sidebar-module">
  			<p>
  				<strong>David Mooney</strong><br />
  				5 Chapel View<br />
  				Station Road<br />
  				Turton<br />
  				Bolton BL7 0LE<br />
  				Tel: 07887 552 442
  			</p>
  		</div>

      <div class="sidebar-module">
  				<p>
  						<?php if($_SERVER['PHP_SELF'] != "/terms.php"){ ?>
  							<a href="terms.php">Terms and Conditions</a>
  						<?php } ?>
  				</p>
  		</div>
    </div>

              <?php include 'footer.php'; ?>
