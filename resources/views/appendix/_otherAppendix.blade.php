<!-- otherAppendix -->

<!-- form title -->
<div class="legend tfiBlueDark">
    其他附件區      
    <hr class="small-top">
</div> 
<!-- form description --> 
<div class="" style="margin-bottom: 30px;">
    其他附件區      
</div>
<!-- form content --> 
<div>
    <div>
        <!-- transcript: 大學或研究所在校歷年成績單-->
        <div class="form-group" onmouseover="displayExample('transcript')">
            <label for="input" class="col-md-3 control-label">大學或研究所在校歷年成績單</label>
            <div class="col-md-9">
                <input type="file" class="form-control" name="transcript" >
                <div id='transcript'></div>
                {{ $errors->first('transcript') }}
            </div>
        </div>
        <!-- teacherCertification: 合格教師證或教程修畢證明 -->
        <div class="form-group" onmouseover="displayExample('teacherCertification')">
            <label for="input" class="col-md-3 control-label">合格教師證或教程修畢證明</label>
            <div class="col-md-9">
                <input type="file" class="form-control" name="teacherCertification" >
                <div id='teacherCertification'></div>
                {{ $errors->first('teacherCertification') }}
            </div>
        </div>
        <!-- languageCertification: 英語能力或其他語言證明文件 -->
        <div class="form-group" onmouseover="displayExample('languageCertification')">
            <label for="input" class="col-md-3 control-label">語言能力證明文件</label>
            <div class="col-md-9">
                <input type="file" class="form-control" name="languageCertification" >
                <div id='languageCertification'></div>
                {{ $errors->first('languageCertification') }}
            </div>
        </div>
        <!-- otherCertification: 其他相關證明文件 -->
        <div class="form-group" onmouseover="displayExample('otherCertification')">
            <label for="input" class="col-md-3 control-label">其他相關證明文件</label>
            <div class="col-md-9">
                <input type="file" class="form-control" name="otherCertification" >
                <div id='otherCertification'></div>
                {{ $errors->first('otherCertification') }}
            </div>
        </div>
        <hr class="small-top">
    </div>
</div>

