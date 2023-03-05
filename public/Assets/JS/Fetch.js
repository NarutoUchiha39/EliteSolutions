const mysql = require('mysql');

const connection = mysql.createConnection({
    host: 'sql12.freemysqlhosting.net',
    user: 'sql12597283',
    password: '6AsFxpy2Lw',
    port:3306
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
    DAILY_CODING_CHALLENGE_QUERY =JSON.stringify({"operationName":"questionData","variables":{"titleSlug":`${iterator}`},"query":"query questionData($titleSlug: String!) {\n  question(titleSlug: $titleSlug) {\n    questionId\n    questionFrontendId\n    boundTopicId\n    title\n    titleSlug\n    content\n    translatedTitle\n    translatedContent\n   }\n}\n"})
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
    let questions = ["min-cost-to-connect-all-points","jump-game"] 

    for (const iterator of questions) 
    {
      let response = await fetchDailyCodingChallenge(iterator)
      response = response.data.question.content
      console.log(response)
    }
}
Call()
connection.end()