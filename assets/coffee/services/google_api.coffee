lft.service 'GoogleApi', ['$window', '$http', '$q', ($window, $http, $q) ->

  auth_url = null

  getAuthUrl = () ->
    promise = $q.defer()
    if auth_url == null
      req = $http.get('/auth/google/url')
      req.success (data) ->
        auth_url = data.auth_url
        promise.resolve data.auth_url
    else
      promise.resolve auth_url
    promise.promise

  GoogleApi =

    finish: (user_info) ->
      console.log 'finished'
      console.log user_info
      delete $window.auth

    prompt: () ->
      getAuthUrl().then (url) ->
        _handle = $window.open url, 'login', 'width=800,height=600'
        $window.auth = GoogleApi.finish
        _handle != null

]
