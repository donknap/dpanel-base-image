<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <title>恭喜，站点创建成功！</title>
  <style>
    .container {
      width: 60%;
      margin: 10% auto 0;
      background-color: #f0f0f0;
      padding: 2% 5%;
      border-radius: 10px
    }

    ul {
      padding-left: 20px;
    }

    ul li {
      line-height: 2.3
    }

    a {
      color: #20a53a
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>恭喜, 站点创建成功！</h1>
    <h3>这是默认index.php,本页面由系统自动生成。</h3>
    <ul>
      <li>当前 php 版本：<?php echo phpversion(); ?>，默认网站目录:/app/wwwroot, nginx 配置目录: /app/nginx </li>
      <li>当前 php 扩展：
        <blockquote class="blockquote" style="word-wrap:break-word;  ">
          <?php echo implode(", ", get_loaded_extensions()); ?>
        </blockquote>
      </li>
      <li>缺少的扩展可以再次编译构建 Dockerfile 进行增加</li>
      <li>您可以通过【容器管理】进入该容器， 交通过【文件管理】功能，上传代码至 /app/wwwroot 目录，完成功部署</li>
      <li>也可以通过修改 /app/nginx 目录中的配置，增加需要的配置</li>
      <li>线上部署时请务必删除此文件</li>
    </ul>
  </div>
</body>

</html>