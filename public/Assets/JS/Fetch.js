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
    connection.end((error) => {
  });


  
const LEETCODE_API_ENDPOINT = 'https://leetcode.com/graphql'
DAILY_CODING_CHALLENGE_QUERY =JSON.stringify({"operationName":"questionData","variables":{"titleSlug":"two-sum"},"query":"query questionData($titleSlug: String!) {\n  question(titleSlug: $titleSlug) {\n    questionId\n    questionFrontendId\n    boundTopicId\n    title\n    titleSlug\n    content\n    translatedTitle\n    translatedContent\n   }\n}\n"})
const fetchDailyCodingChallenge = async () => {
    console.log(`Fetching daily coding challenge from LeetCode API.`)

    const init = {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: DAILY_CODING_CHALLENGE_QUERY,
    }

    const response = await fetch(LEETCODE_API_ENDPOINT, init)
    return response.json()
}

fetchDailyCodingChallenge().then((response)=>{
   
    response = response.data.question.content
    console.log(response)
})