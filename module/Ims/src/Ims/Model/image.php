<?php 
// $this->getApplicantMapper()->uploadImageFile(1);
$upload = $this->upload;
$upload->uploadImageFile(1);

//adding stylesheets specific to this page
$this->headLink()->appendStylesheet($this->basePath('/css/Imageform_style.css'));
$this->headLink()->appendStylesheet($this->basePath('/css/jquery.Jcrop.min.css'));
//adding javascripts specific to this page
$this->headScript()->appendFile($this->basePath('js/jquery.Jcrop.min.js'));
$this->headScript()->appendFile($this->basePath('js/jquery.min.js'));
$this->headScript()->appendFile($this->basePath('js/script.js'));
?>
<section>
    <div id="form_div">
    <!--<fieldset>-->
    <legend><strong>Photograph</strong></legend>
        <!-- upload form -->
        <form id="upload_form" enctype="multipart/form-data" method="post" onsubmit="return checkForm()">
            <!-- hidden crop params -->
            <input type="hidden" id="x1" name="x1" />
            <input type="hidden" id="y1" name="y1" />
            <input type="hidden" id="x2" name="x2" />
            <input type="hidden" id="y2" name="y2" />
            Step1: Please select image file
            <input type="file" name="image_file" id="image_file" onchange="fileSelectHandler()" accept="image/*" />
            <div class="error"></div> 
            <div class="step2"> 
                <p style="">Step2: Please select a crop region </p>
                <div><img id="preview"/></div>
                <div id="image_details" class="info">
                    <p><label for="filesize">File size</label> <input type="text" id="filesize" name="filesize" ></p>
                    <p><label for="filetype">Type</label> <input type="text" id="filetype" name="filetype" ></p>
                    <p><label for="filedim">Dimension</label> <input type="text" id="filedim" name="filedim" ></p>
                    <p><label for="w">Width</label> <input type="text" id="w" name="w" ></p>
                    <p><label for="h">Height</label> <input type="text" id="h" name="h" ></p>
                </div>
                <div>
                    <input type="submit" value="Upload" name="upload" />
                </div>
            </div>
        </form>
<!--                                <functions>
            <input name="previous" type="button" id="previous" onClick="window.location.href='<?php echo $previous; ?>'" value="<< Previous">
            <input name="next" type="button" id="next" onClick="window.location.href='<?php echo $next; ?>'" value="Next >>">
        </functions>-->
    <!--</fieldset>-->
    </div>
<?php // $sImage = uploadImageFile(1);?>                                
</section>
