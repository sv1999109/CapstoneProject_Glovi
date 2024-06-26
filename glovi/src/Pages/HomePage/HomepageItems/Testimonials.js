import React from 'react';
import { FaArrowAltCircleRight } from 'react-icons/fa';
import { TiArrowRight, TiArrowRightOutline } from 'react-icons/ti';

const Testimonials = () => {

  const testimonials = [
    {
      id: 1,
      userImage: 'https://via.placeholder.com/150', 
      userName: 'John Doe',
      designation: 'CEO, Company A',
      companyLogo: 'https://via.placeholder.com/100', 
      comment: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut tellus quis nisi efficitur sagittis. Nulla facilisi. Fusce ut tellus quis nisi efficitur sagittis. Nulla facilisi.'
    },
    {
      id: 2,
      userImage: 'https://via.placeholder.com/150', 
      userName: 'Jane Smith',
      designation: 'CTO, Company B',
      companyLogo: 'https://via.placeholder.com/100', 
      comment: 'Sed vitae malesuada libero. Integer ac ultricies sapien. Nam efficitur bibendum magna nec gravida. Sed vitae malesuada libero. Integer ac ultricies sapien. Nam efficitur bibendum magna nec gravida.'
    },
    {
      id: 3,
      userImage: 'https://via.placeholder.com/150', 
      userName: 'John Doe',
      designation: 'CEO, Company A',
      companyLogo: 'https://via.placeholder.com/100', 
      comment: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce ut tellus quis nisi efficitur sagittis. Nulla facilisi.'
    },
    {
      id: 4,
      userImage: 'https://via.placeholder.com/150', 
      userName: 'Jane Smith',
      designation: 'CTO, Company B',
      companyLogo: 'https://via.placeholder.com/100', 
      comment: 'Sed vitae malesuada libero. Integer ac ultricies sapien. Nam efficitur bibendum magna nec gravida.'
    },
  ];

  return (
    <div className="px-4 max-w-7xl mx-auto">
      <h1 style={{color: "rgb(54 19 74)"}} className='text-4xl font-bold text-center'>Very Happy Customers</h1>
      <p className='text-xl text-center text-gray-600 my-4'>See what others are saying</p>
      <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
        {testimonials.map(testimonial => (
          <div key={testimonial.id} className="bg-white rounded-lg shadow-lg p-6">
            <div className="flex items-center mb-4">
              <img style={{ marginRight: "10px" }} src={testimonial.userImage} alt="User" className="w-16 h-16 rounded-full" />
              <div>
                <h3 className="text-lg font-semibold">{testimonial.userName}</h3>
                <p className="text-gray-500">{testimonial.designation}</p>
              </div>
              <img src={testimonial.companyLogo} alt="Company" className="w-12 h-12 ml-auto" />
            </div>
            <p className="text-gray-800 text-md">{testimonial.comment}</p>
          </div>
        ))}
      </div>
      <div className='flex justify-center'>
        <button style={{background: "#ffa23c", margin: "70px"}} className="border text-xl border-blue-500 text-white hover:bg-blue-500 hover:text-white font-semibold py-4 px-6 rounded-lg focus:outline-none focus:shadow-outline">
          Start Shipping <TiArrowRight className='inline text-5xl'/>
        </button>
      </div>
    </div>
  );
};

export default Testimonials;
