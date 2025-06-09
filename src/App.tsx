import React, { useState } from 'react';
import { PaperAirplaneIcon } from '@heroicons/react/24/solid';

interface Message {
  content: string;
  role: 'user' | 'assistant';
}

function App() {
  const [messages, setMessages] = useState<Message[]>([]);
  const [input, setInput] = useState('');

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    if (!input.trim()) return;

    // Add user message
    const newMessages = [...messages, { content: input, role: 'user' }];
    setMessages(newMessages);
    
    // Simulate assistant response
    setTimeout(() => {
      setMessages([...newMessages, {
        content: "This is a simulated response. Replace this with your actual chatbot integration.",
        role: 'assistant'
      }]);
    }, 1000);

    setInput('');
  };

  return (
    <div className="flex h-screen bg-chatgpt-dark">
      {/* Sidebar */}
      <div className="w-64 bg-chatgpt-dark p-4 text-white">
        <button className="w-full border border-white/20 rounded p-3 text-white hover:bg-gray-700 transition">
          New Chat
        </button>
      </div>

      {/* Main chat area */}
      <div className="flex-1 flex flex-col bg-chatgpt-gray">
        {/* Messages */}
        <div className="flex-1 overflow-y-auto p-4 space-y-4">
          {messages.map((message, index) => (
            <div
              key={index}
              className={`p-6 ${
                message.role === 'assistant' ? 'bg-assistant-bg' : 'bg-user-bg'
              }`}
            >
              <div className="max-w-3xl mx-auto flex">
                <div className={`w-8 h-8 rounded-sm ${
                  message.role === 'assistant' ? 'bg-green-600' : 'bg-blue-600'
                } flex items-center justify-center text-white font-bold mr-4`}>
                  {message.role === 'assistant' ? 'A' : 'U'}
                </div>
                <div className="flex-1 text-white">{message.content}</div>
              </div>
            </div>
          ))}
        </div>

        {/* Input area */}
        <div className="border-t border-white/20 p-4">
          <form onSubmit={handleSubmit} className="max-w-3xl mx-auto relative">
            <input
              type="text"
              value={input}
              onChange={(e) => setInput(e.target.value)}
              placeholder="Send a message..."
              className="w-full p-4 pr-12 rounded-lg bg-gray-700 text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500"
            />
            <button
              type="submit"
              className="absolute right-2 top-1/2 -translate-y-1/2 p-2 text-gray-400 hover:text-white"
            >
              <PaperAirplaneIcon className="w-6 h-6" />
            </button>
          </form>
        </div>
      </div>
    </div>
  );
}

export default App; 