const fs = require('fs');
const path = require('path');

// Regex to match emojis
const emojiRegex = /[\u{1F600}-\u{1F64F}\u{1F300}-\u{1F5FF}\u{1F680}-\u{1F6FF}\u{1F700}-\u{1F77F}\u{1F780}-\u{1F7FF}\u{1F800}-\u{1F8FF}\u{1F900}-\u{1F9FF}\u{1FA00}-\u{1FA6F}\u{1FA70}-\u{1FAFF}\u{2600}-\u{26FF}\u{2700}-\u{27BF}\u{2300}-\u{23FF}\u{2B50}\u{2B55}\u{2934}\u{2935}\u{200D}\u{FE0F}]/gu;

function removeEmojis(dir) {
    const files = fs.readdirSync(dir);
    
    for (const file of files) {
        if (file === 'node_modules' || file === 'vendor' || file === '.git') continue;
        
        const fullPath = path.join(dir, file);
        const stat = fs.statSync(fullPath);
        
        if (stat.isDirectory()) {
            removeEmojis(fullPath);
        } else if (file.endsWith('.md') || file.endsWith('.js') || file.endsWith('.vue') || file.endsWith('.php') || file.endsWith('.html') || file.endsWith('.css')) {
            try {
                let content = fs.readFileSync(fullPath, 'utf8');
                if (emojiRegex.test(content)) {
                    content = content.replace(emojiRegex, '');
                    fs.writeFileSync(fullPath, content, 'utf8');
                    console.log('Removed emojis from: ' + fullPath);
                }
            } catch (e) {
                console.error('Error reading ' + fullPath);
            }
        }
    }
}

removeEmojis(__dirname);
console.log("Done");
