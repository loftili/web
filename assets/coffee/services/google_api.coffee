lft.service 'GoogleApi', ['$window', '$http', '$q', ($window, $http, $q) ->

  getAuthUrl = () ->
    promise = $q.defer()
    req = $http.get('/auth/google/url')
    req.success (data) ->
      promise.resolve data.auth_url
    promise.promise

  GoogleApi =

    finish: (user_info) ->
      console.log 'finished'
      console.log user_info
      delete $window.auth

    prompt: () ->
      getAuthUrl().then (auth_url) ->
        _handle = $window.open auth_url, 'login', 'width=800,height=600'
        $window.auth = GoogleApi.finish
        _handle != null

]
