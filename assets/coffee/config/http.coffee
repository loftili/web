lft.run ['$http', 'CSRF', ($http, CSRF) ->

  $http.defaults.headers.common['X-Loftili-Session'] = CSRF

]
