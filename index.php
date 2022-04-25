<!doctype html>
<html lang="en">
<head>
  <link rel="stylesheet" href="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>assets/css/bootstrap.min.css">
  <script src="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>assets/js/jquery.min.js"></script>
  <script src="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>assets/js/jquery.validate.min.js"></script>
  <script src="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>assets/js/js-yaml.min.js"></script>
  <script src="http://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>assets/js/app.js"></script>
  <title>Templating Engine</title>
</head>
<body>
<div class="container">
  <div class="py-5 text-center">
    <h2>Templating Engine</h2>
  </div>
  <div class="row">
    <div class="col-md-12">
      <form id="template-form" class="needs-validation" method="post" onsubmit="return false;">
        <div class="row">
          <div class="col-md-12">
            <label for="template_input"><strong>Template input:</strong></label>
            <input type="text" required class="form-control" id="template_input" name="template_input" title="Template input" placeholder="Enter Template input here">
          </div>
          <div class="col-md-12">&nbsp;</div>
          <div class="col-md-12">
            <label for="yaml_input"><strong>Yaml input:</strong></label>
            <input type="text" required class="form-control" id="yaml_input" name="yaml_input" title="Yaml input" placeholder="Enter Yaml input here">
          </div>
          <div class="col-md-12">&nbsp;</div>
          <div id="output" class="col-md-12" style="display:none;">
            <label for="output-content"><strong>Output:</strong></label>
            <div id="output-content"></div>
          </div>
        </div>
        <hr class="mb-4">
        <input class="btn btn-primary btn-lg btn-block btn-submit" type="submit" value="Submit">
      </form>
    </div>
  </div>
  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy <?php echo date('Y'); ?></p>
  </footer>
</div>
</body>
</html>