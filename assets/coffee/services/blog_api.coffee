lft.service 'BlogApi', ['$resource', ($resource) ->

  Comment = $resource '/blog/comments', {}

  BlogApi =
    Comment: Comment
    
]
