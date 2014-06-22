lft.directive 'lftBlogLoginForm', ['GoogleApi', 'AuthManager', (GoogleApi, AuthManager) ->

  lftBlogLoginForm =
    restrict: 'EA'
    replace: true
    templateUrl: 'directives.blog.login_form'
    link: ($scope, $element, $attrs) ->

      success = (user_info) ->
        AuthManager.setCurrentUser user_info

      $scope.openAuth = () ->
        GoogleApi.prompt().then success

]
