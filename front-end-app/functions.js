

angular.module('code-foo', ['ui.bootstrap']).controller('CodeFooController', function($http, $q, $sce){

  var url = $sce.trustAsResourceUrl("http://c-6rtwjumjzx7877x24nls-funx78x2emjwtpzfuux2ehtr.g00.ign.com/g00/3_c-6bbb.nls.htr_/c-6RTWJUMJZX77x24myyux78x3ax2fx2fnls-funx78.mjwtpzfuu.htrx2f_$/$?i10c.ua=1");

  console.log(url);
  var contentControl = this;
  contentControl.articleContent = [];
  contentControl.videoContent = [];
  contentControl.videoIds = [];
  contentControl.articleIds = [];
  contentControl.previewCollapsed = true;


  this.getComments = function(contentId, isVideo){
    var endpointUrl = "https://ign-apis.herokuapp.com/comments?ids=";
    contentId.forEach(function(id){
      endpointUrl = endpointUrl  + id + ",";
    });
    endpointUrl = $sce.trustAsResourceUrl(endpointUrl);
    $http.jsonp(endpointUrl).then(function(data){
      if(isVideo){
        contentControl.videoCommentCounts = data.data.content;
      }else{
        contentControl.articleCommentCounts = data.data.content;
      }
    });
  }

  this.getContent = function(startIndex, count){

    var endpointUrl = $sce.trustAsResourceUrl("https://ign-apis.herokuapp.com/content"+"?startIndex="+startIndex+"&count="+count);

    $http.jsonp(endpointUrl).then(function(data){
      var contentList = data.data.data;
      contentList.forEach(function(content){
        if(content.metadata.contentType == "video"){
          contentControl.videoContent.push(content);
          contentControl.videoIds.push(content.contentId);
        }
        else if(content.metadata.contentType == "article"){
          contentControl.articleContent.push(content);
          contentControl.articleIds.push(content.contentId);
        }
      });
      contentControl.getComments(contentControl.videoIds, true);
      contentControl.getComments(contentControl.articleIds, false);
      console.log(contentControl.articleContent);
      console.log(contentControl.videoContent);
    });
  };

  this.testMessage = function(){
    console.log("test works");
  }
  $http.get(url).then(function(data){
    console.log(data.data);
    console.log(data.data.endpoints[0]);
  });



  contentControl.getContent(0, 10);


});
