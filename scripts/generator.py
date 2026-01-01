import urllib.parse
import sys

def generate_payloads(base_payload):
    variations = []
    
    # 1. URL Encoding
    variations.append(urllib.parse.quote(base_payload))
    
    # 2. Double URL Encoding
    variations.append(urllib.parse.quote(urllib.parse.quote(base_payload)))
    
    # 3. Hex Encoding (MySQL style)
    hex_val = "0x" + base_payload.encode().hex()
    variations.append(hex_val)
    
    # 4. Case Variation (Basic keyword replacement)
    keywords = ["SELECT", "UNION", "ALL", "WHERE", "OR", "AND", "SLEEP", "WAITFOR"]
    case_var = base_payload
    for kw in keywords:
        if kw.lower() in case_var.lower():
            # Random simple case swap for demonstration
            case_var = case_var.replace(kw.lower(), kw.capitalize())
    variations.append(case_var)

    return variations

if __name__ == "__main__":
    if len(sys.argv) < 2:
        print("Usage: python generator.py \"<payload>\"")
        sys.exit(1)
        
    payload = sys.argv[1]
    print(f"Original: {payload}\n")
    print("--- Variations ---")
    for var in generate_payloads(payload):
        print(var)
