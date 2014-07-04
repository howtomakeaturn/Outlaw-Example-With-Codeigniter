      <a class="btn btn-lg btn-success" href="#">
        <i class="fa fa-flag fa-2x pull-left"></i> Font Awesome<br>Work well here</a>

      <div class="btn-group">
        <a class="btn btn-primary" href="#"><i class="fa fa-user fa-fw"></i> User</a>
        <a class="btn btn-primary dropdown-toggle" data-toggle="dropdown" href="#">
          <span class="fa fa-caret-down"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#"><i class="fa fa-pencil fa-fw"></i> Edit</a></li>
          <li><a href="#"><i class="fa fa-trash-o fa-fw"></i> Delete</a></li>
          <li><a href="#"><i class="fa fa-ban fa-fw"></i> Ban</a></li>
          <li class="divider"></li>
          <li><a href="#"><i class="i"></i> Bootstrap js work well here</a></li>
        </ul>
      </div>    

      <div class='alert alert-info'><p><i class="fa fa-camera-retro fa-3x"></i> Bootstrap css work well here</p></div>
      <div id='message' class='alert alert-success'>jquery work well here!</div>
      <button id='jq' class='btn btn-warning'>Click Me!</button>
      <script>
          $('#message').hide();
          $('#jq').click(function(){
              $('#message').fadeIn();
          })
      </script>


