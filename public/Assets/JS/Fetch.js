const mysql = require('mysql');

const connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '9820042597',
    port:3306,
    database:'Project'
  });
  
  connection.connect((error) => {
    if(error){
      console.log('Error connecting to the MySQL Database');
      return;
    }
    console.log('Connection established sucessfully');
  });



const LEETCODE_API_ENDPOINT = 'https://leetcode.com/graphql'

const fetchDailyCodingChallenge = async (iterator) => {
  DAILY_CODING_CHALLENGE_QUERY =JSON.stringify({"operationName":"questionData","variables":{"titleSlug":`${iterator}`},"query":"query questionData($titleSlug: String!) {\n  question(titleSlug: $titleSlug) {\n    questionId\n    questionFrontendId\n  difficulty\n  boundTopicId\n    title\n    titleSlug\n    content\n  categoryTitle\n  translatedTitle\n    translatedContent\n topicTags{name slug }\n }\n}\n"})
    const init = {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: DAILY_CODING_CHALLENGE_QUERY,
    }

    const response = await fetch(LEETCODE_API_ENDPOINT, init)
    return response.json()
}
async function Call() 
{
    let questions = ['number-of-islands','course-schedule','redundant-connection','coin-change','longest-common-subsequence','subsets','fibonacci-number','min-cost-to-connect-all-points','network-delay-time','best-time-to-buy-and-sell-stock','longest-substring-without-repeating-characters','single-threaded-cpu'] 

    for (const iterator of questions) 
    {
      let response = await fetchDailyCodingChallenge(iterator)
      if(response){
      
      sql = `insert into questions(title,category,difficulty,description) values('${response.data.question.title}','${
        response.data.question.topicTags[response.data.question.topicTags.length-1].name}','${response.data.question.difficulty}','${response.data.question.content}')`

        connection.query(sql)
    }
  }
    connection.end()
}
Call()  

