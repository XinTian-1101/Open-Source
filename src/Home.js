import './Home.css';
import { Link } from 'react-router';
import catImg from '../src/assets/images/cat.jpg'
import catVideo from '../src/assets/videos/cute_cat_video.mp4'

function Home(){

    const paragraphStyle = {fontSize:'16px'}

    return(

        <div className='main-container'>
      
            {/* This is the heading sections */}
            <h1 style={{color:'darkred'}}> Welcome to My Webpage</h1>
            <h2> About Me</h2>

            {/* This is content about me */}
            <p style={paragraphStyle}>I am Lye Xin Tian, currently is a Y3S2 student from Information System Department.</p>
            <p style={paragraphStyle}>My hobbies is sleeping, playing mobile game and reading comic or novel as all of these hobbies can help me release my stress. </p>
            <p style={paragraphStyle}>My favourite animal is cat. </p>

            {/* This is the image section (responsive) */}
            <div className='image-container'>
                <div className='image-wrapper'>
                    <img src={catImg} alt='Cute Cat On The Grass' ></img>
                </div>
            </div>
           

            {/* create link */}
            <div className = 'link-container'>
                {/* External link - uses regular <a> tag */}
                <a href='https://www.google.com'>Visit Google</a>

                 {/* Internal link - uses React Router's Link */}
                <Link to='/aboutMyCat'>About My Cat</Link>
                
            </div>

            
                <p style={paragraphStyle}>My Top 3 favourite movies & hobbies :</p>

                <div className='list-container'>

                    {/* Ordered List - Movies */}
                    <h3>Favourite Movies:</h3>
                    <ol>
                        <li>Ne Zha 2</li>
                        <li>Ne Zha 1</li>
                        <li>The Hunger Game</li>
                    </ol>
          
                    {/* Unordered List - Hobbies */}
                    <ul>
                        <li>Sleeping</li>
                        <li>Playing Mobile Game</li>
                        <li>Reading</li>
                    </ul>

                </div>

                {/* Create Table */}
                <h3>Table</h3>

                <div className='table-container'>

                   <table border='1' width={'40%'}>
                        <caption style={{paddingBottom:'0.5rem'}}>Age of Friends</caption>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Age</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>John</td>
                                <td>25</td>
                            </tr>
                        </tbody>

                        <tfoot>
                            <tr>
                                <td>Alice</td>
                                <td>30</td>
                            </tr>
                        </tfoot>

                   </table>
                </div>

                 {/* Embedding a Video (responsive) */}
                 {/* Using video URL */}
                
                <h3>Funny Video 1</h3>
                <div className='video-container'>
                    <a href='https://youtu.be/IxX_QHay02M?si=SVRSC1ZnXbpu0B5n'>Watch It !!!</a>
                </div>

                {/* Using iframe*/}
                <h3>Funny Video 2</h3>
                <div className='video-container'>

                    <div className='video-wrapper'>
                        <iframe src="https://www.youtube.com/embed/fKB_bdxIbdI?si=xBqIOXBy5G-nvV4X" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>            
                    </div>
                    
                </div>

                {/* Embedd Downloaded Video */}
                <h3>Cute Cat Video</h3>
                <div className='video-container'>
                    <div className='video-wrapper'>
                        <video controls className='responsive-video'>
                            <source src={catVideo}type='video/mp4'/>
                           
                        </video>
                    </div>
                </div>
         
        </div>

    );
}
export default Home;