use movieRating
db.movie.insertMany(
[
{
	_id:101
	, title:"Gone with the Wind"
	, director: "Victor Fleming"
	, year: 1939
	, ratings:[
		{
			rid:201,
			stars:2 ,
			ratingDate:"2011-01-22"
		}
		,
		{
			rid:201,
			stars:4,
			ratingDate:"2011-01-27"
		}
		,
		{
			rid:204,
			stars:3,
			ratingDate:"2011-01-09"
		}
	]
}
,
{
	_id:103
	, title:"The sound of Music"
	, year:"1965"
	, director:"Robert Wise"
	, ratings:[
		{
			rid:203,
			stars:2,
			ratingDate:"2011-01-20"
		}
		,
		{
			rid:205,
			stars:3,
			ratingDate:"2011-01-27"
		}
	]
}
,
{
	_id:104
	, title:"E.T."
	, year:"1982"
	, director:"Steven Spielberg"
	, ratings:[
		{
			rid:205,
			stars:2,
			ratingDate:"2011-01-22"
		}
		,
		{
			rid:208,
			stars:3,
			ratingDate:"2011-01-02"
		}

	]
}
,
{
	_id:106
	, title:"Snow White"
	, year:"1937"
	, director:""
	, ratings:[
		{
			rid:202,
			stars:4,
			ratingDate:""
		}
		,
		{
			rid:206,
			stars:5,
			ratingDate:"2011-01-19"
		}

	]
}
,
{
	_id:107
	, title:"Avatar"
	, year:"2009"
	, director:"James Cameron"
	, ratings:[
		{
			rid:206,
			stars:3,
			ratingDate:"2011-01-15"
		}
		,
		{
			rid:207,
			stars:5,
			ratingDate:"2011-01-20"
		}
	]
}
,
{
	_id:108
	, title:"Raider of the lost Ark"
	, year:"1981"
	, director:"Steven Spielberg"
	, ratings:[
		{
			rid:203,
			stars:2,
			ratingDate:"2011-01-30"
		}
		,
		{
			rid:203,
			stars:4,
			ratingDate:"2011-01-12"
		}
		,
		{
			rid:205,
			stars:4,
			ratingDate:""
		}
	]
}
]
)

db.movie.insertMany(
[
	{
		_id:102
		, title:"Star Wars"
		, year:"1977"
		, director:"George Lucas"
		, ratings:[
		]
	}
	,
	{
		_id:105
		, title:"Titanic"
		, year:"1997"
		, director:"James Cameron"
		, ratings:[
		]
	}
]
)

db.movie.insert(
[
	{
		_id:
		, title:""
		, year:""
		, director:""
		, ratings:[
			{
				rid:
				, stars:
				, ratingDate:""
			}
		]
	}
]
)


db.reviewer.insertMany(
[
	{
		_id:201
		,name:"Sarah Martinez"
	}
	,
	{
		_id:202
		,name:"Daniel Lewis"
	}
	,
	{
		_id:203
		,name:"Brittany Harris"
	}
	,
	{
		_id:204
		,name:"Mike Anderson"
	}
	,
	{
		_id:205
		,name:"Chris Jackson"
	}
	,
	{
		_id:206
		,name:"Elizabeth Thomas"
	}
	,
	{
		_id:207
		,name:"James Cameron"
	}
	,
	{
		_id:208
		,name:"Ashley White"
	}
]
)
