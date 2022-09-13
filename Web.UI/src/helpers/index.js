export const whenPatternMatches = (string, patterns) => {
    const foundPattern = patterns.find(([pattern]) => pattern.exec(string));

    if (foundPattern) {
        const [, effect] = foundPattern;
        return effect
    }

}