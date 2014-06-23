lft.service 'AuthManager', ['$q', '$http', 'CSRF', ($q, $http, CSRF) ->

  current_user = null
  initialized = false

  initializeAuth = () ->
    initialized = true
    deferred = $q.defer()

    req = $http.get '/session'

    req.success (data) ->
      current_user = data
      deferred.resolve(data)

    deferred.promise
    
  AuthManager =
    
    getCurrentUser: () ->
      if !initialized
        initializeAuth()
      else
        current_user

    setCurrentUser: (user) ->
      current_user = user


]
